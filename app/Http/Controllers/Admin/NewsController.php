<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminNewsCreateRequest;
use App\Http\Requests\AdminNewsUpdateRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;
use App\Models\Tag;
use App\Traits\FileUploadTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:news index,admin'])->only(['index', 'copyNews']);
        $this->middleware(['permission:news create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:news update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:news delete,admin'])->only(['destroy']);
        $this->middleware(['permission:news all-access,admin'])->only(['toggleNewsStatus']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (canAccess(['news all-access'])) {
            $news = News::leftJoin('news_description', 'news.id', '=', 'news_description.news_id')
                ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
                ->leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
                ->select(
                    'news.id as id',
                    'news.author_id as author_id',
                    'news.image as image',
                    'news.slug as slug',
                    'news.is_breaking_news as is_breaking_news',
                    'news.show_at_slider as show_at_slider',
                    'news.show_at_popular as show_at_popular',
                    'news.is_approved as is_approved',
                    'news.status as status',
                    'news_description.language_id as language_id',
                    'news_description.title as title',
                    'categories_description.name as category_name'
                )
                ->where('news_description.language_id', getLanguageId())
                ->where('categories_description.language_id', getLanguageId())
                ->where('news.is_approved', 1)
                ->orderByDesc('news.id')
                ->get();
        } else {
            $news = News::leftJoin('news_description', 'news.id', '=', 'news_description.news_id')
                ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
                ->leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
                ->select(
                    'news.id as id',
                    'news.author_id as author_id',
                    'news.image as image',
                    'news.slug as slug',
                    'news.is_breaking_news as is_breaking_news',
                    'news.show_at_slider as show_at_slider',
                    'news.show_at_popular as show_at_popular',
                    'news.is_approved as is_approved',
                    'news.status as status',
                    'news_description.language_id as language_id',
                    'news_description.title as title',
                    'categories_description.name as category_name'
                )
                ->where('news_description.language_id', getLanguageId())
                ->where('categories_description.language_id', getLanguageId())
                ->where('news.is_approved', 1)
                ->where('news.author_id', auth()->guard('admin')->user()->id)
                ->orderByDesc('news.id')
                ->get();
        }

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        $categories = Category::leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
            ->select(
                'categories.id as id',
                'categories_description.name as name'
            )
            ->where('categories_description.language_id', getLanguageId())
            ->orderByDesc('categories.id')
            ->get();
        return view('admin.news.create', compact('languages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminNewsCreateRequest $request)
    {
        $news = new News();
        $news->category_id = $request->category_id;
        $news->author_id = Auth::guard('admin')->user()->id;
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);
        $news->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $news->slug = $request->slug;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->is_approved = (getRole() == 'Super Admin' || checkPermission('news all-access')) ? 1 : 0;
        $news->save();
        foreach ($request->description as $description) {
            $news->description()
                ->create([
                    'language_id' => $description['language_id'],
                    'title' => $description['title'],
                    'content' => $description['content'],
                    'meta_title' => $description['meta_title'],
                    'meta_description' => $description['meta_description']
                ]);
            $tags = explode(',', $description['tags']);
            $tagIds = [];
            foreach ($tags as $tag) {
                $item = new Tag();
                $item->name = $tag;
                $item->language_id = $description['language_id'];
                $item->save();
                $tagIds[] = $item->id;
            }
            $news->tags()->attach($tagIds);
        }

        toast(__('admin.Created successfully!'), 'success')->width('400');

        return redirect()->route('admin.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $news = [];
        $categories = Category::leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
            ->select(
                'categories.id as id',
                'categories_description.name as name'
            )
            ->where('categories_description.language_id', getLanguageId())
            ->orderByDesc('categories.id')
            ->get();
        foreach ($languages as $language) {
            $news[$language->id] = News::leftJoin('news_description', 'news.id', '=', 'news_description.news_id')
                ->select(
                    'news.id as id',
                    'news.category_id as category_id',
                    'news.image as image',
                    'news.slug as slug',
                    'news.is_breaking_news as is_breaking_news',
                    'news.show_at_slider as show_at_slider',
                    'news.show_at_popular as show_at_popular',
                    'news.is_approved as is_approved',
                    'news.status as status',
                    'news.views as views',
                    'news_description.language_id as language_id',
                    'news_description.title as title',
                    'news_description.content as content',
                    'news_description.meta_title as meta_title',
                    'news_description.meta_description as meta_description',
                )
                ->where('news.id', $id)
                ->where('news_description.language_id', $language->id)
                ->first();
        }

        if (!canAccess(['news all-access'])) {
            if (current($news)->author_id != auth()->guard('admin')->user()->id) {
                return abort(404);
            }
        }

        return view('admin.news.edit', compact('languages', 'news', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminNewsUpdateRequest $request, string $id)
    {
        $news = News::findOrFail($id);
        if ($news->author_id != auth()->guard('admin')->user()->id || getRole() != 'Super Admin') {
            return abort(404);
        }
        $news->category_id = $request->category_id;
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);
        $news->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $news->slug = $request->slug;
        $news->is_breaking_news = $request->is_breaking_news == 1 ? 1 : 0;
        $news->show_at_slider = $request->show_at_slider == 1 ? 1 : 0;
        $news->show_at_popular = $request->show_at_popular == 1 ? 1 : 0;
        $news->status = $request->status == 1 ? 1 : 0;
        $news->is_approved = (getRole() == 'Super Admin' || checkPermission('news all-access')) ? 1 : 0;
        $news->save();
        foreach ($request->description as $description) {
            $news->description()
                ->where('news_id', $news->id)
                ->where('language_id', $description['language_id'])
                ->updateOrCreate(
                    [
                        'news_id' => $news->id,
                        'language_id' => $description['language_id'],
                    ],
                    [
                        'language_id' => $description['language_id'],
                        'title' => $description['title'],
                        'content' => $description['content'],
                        'meta_title' => $description['meta_title'],
                        'meta_description' => $description['meta_description']
                    ]
                );
            $news->tags()->where('language_id', $description['language_id'])->delete();
            $news->tags()->where('language_id', $description['language_id'])->detach($news->tags);
            $tags = explode(',', $description['tags']);
            $tagIds = [];
            foreach ($tags as $tag) {
                $item = new Tag();
                $item->name = $tag;
                $item->language_id = $description['language_id'];
                $item->save();
                $tagIds[] = $item->id;
            }
            $news->tags()->attach($tagIds);
        }

        toast(__('admin.Updated successfully!'), 'success')->width('400');

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $news = News::findOrFail($id);
        $this->deleteFile($news->image);
        $news->tags()->delete();
        $news->delete();

        return response(['status' => 'success', 'message' => __('admin.Deleted successfully!')]);
    }

    /**
     * Fetch category depending on language
     */
    public function fetchCategory(Request $request)
    {
        return Category::where('language', $request->lang)->get();
    }

    /**
     * Change toggle status of news
     */
    public function toggleNewsStatus(Request $request)
    {
        try {
            $news = News::findOrFail($request->id);
            $news->{$request->name} = $request->status;
            $news->save();

            return response(['status' => 'success', 'message' => __('admin.Updated successfully!')]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Copy news
     */
    public function copyNews(string $id)
    {
        $news = News::findOrFail($id);
        $copyNews = $news->replicate();
        $copyNews->save();

        toast(__('admin.Copied successfully!'), 'success');

        return redirect()->back();
    }

    public function pendingNews(): View
    {
        $languages = Language::all();
        if (canAccess(['news all-access'])) {
            $news = News::leftJoin('news_description', 'news.id', '=', 'news_description.news_id')
                ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
                ->leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
                ->select(
                    'news.id as id',
                    'news.author_id as author_id',
                    'news.image as image',
                    'news.slug as slug',
                    'news.is_approved as is_approved',
                    'news_description.language_id as language_id',
                    'news_description.title as title',
                    'categories_description.name as category_name'
                )
                ->where('news_description.language_id', getLanguageId())
                ->where('categories_description.language_id', getLanguageId())
                ->where('news.is_approved', 0)
                ->orderByDesc('news.id')
                ->get();
        } else {
            $news = News::leftJoin('news_description', 'news.id', '=', 'news_description.news_id')
                ->leftJoin('categories', 'news.category_id', '=', 'categories.id')
                ->leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
                ->select(
                    'news.id as id',
                    'news.author_id as author_id',
                    'news.image as image',
                    'news.slug as slug',
                    'news.is_approved as is_approved',
                    'news_description.language_id as language_id',
                    'news_description.title as title',
                    'categories_description.name as category_name'
                )
                ->where('news_description.language_id', getLanguageId())
                ->where('categories_description.language_id', getLanguageId())
                ->where('news.is_approved', 0)
                ->where('news.author_id', auth()->guard('admin')->user()->id)
                ->orderByDesc('news.id')
                ->get();
        }

        return view('admin.news.index', compact('news'));
    }

    function approveNews(Request $request): Response
    {
        $news = News::findOrFail($request->id);
        $news->is_approved = $request->is_approve;
        $news->save();

        return response(['status' => 'success', 'message' => __('admin.Updated successfully!')]);
    }
}
