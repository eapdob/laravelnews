<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminCategoryCreateRequest;
use App\Http\Requests\AdminCategoryUpdateRequest;
use App\Models\Category;
use App\Models\Language;
use App\Models\News;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:category index,admin'])->only('index');
        $this->middleware(['permission:category create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:category update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:category delete,admin'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
            ->select(
                'categories.id as id',
                'categories.slug as slug',
                'categories.show_at_nav as show_at_nav',
                'categories.status as status',
                'categories_description.language_id as language_id',
                'categories_description.name as name'
            )
            ->where('categories_description.language_id', getLanguageId())
            ->orderByDesc('id')
            ->get();

        return view('admin.category.index', compact('categories'));
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
            ->orderByDesc('id')
            ->get();
        return view('admin.category.create', compact('languages', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminCategoryCreateRequest $request)
    {
        $category = new Category();
        $category->parent_id = $request->parent_id;
        $category->slug = $request->slug;
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();
        foreach ($request->description as $description) {
            $category->description()
                ->create([
                    'language_id' => $description['language_id'],
                    'name' => $description['name']
                ]);
        }

        toast(__('admin.Created successfully!'), 'success')->width('400');

        return redirect()->route('admin.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $category = [];
        $categories = Category::leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
            ->select(
                'categories.id as id',
                'categories_description.name as name'
            )
            ->where('categories_description.language_id', getLanguageId())
            ->orderByDesc('id')
            ->get();
        foreach ($languages as $language) {
            $category[$language->id] = Category::leftJoin('categories_description', 'categories.id', '=', 'categories_description.category_id')
                ->select(
                    'categories.id as id',
                    'categories.parent_id as parent_id',
                    'categories.slug as slug',
                    'categories.show_at_nav as show_at_nav',
                    'categories.status as status',
                    'categories_description.language_id as language_id',
                    'categories_description.name as name'
                )
                ->where('categories.id', $id)
                ->where('categories_description.language_id', $language->id)
                ->first();
        }

        return view('admin.category.edit', compact('languages', 'category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminCategoryUpdateRequest $request, string $id)
    {
        $category = Category::findOrFail($id);
        $category->parent_id = $request->parent_id;
        $category->slug = $request->slug;
        $category->show_at_nav = $request->show_at_nav;
        $category->status = $request->status;
        $category->save();
        foreach ($request->description as $description) {
            $category->description()
                ->where('category_id', $category->id)
                ->where('language_id', $description['language_id'])
                ->updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'language_id' => $description['language_id'],
                    ],
                    [
                        'language_id' => $description['language_id'],
                        'name' => $description['name']
                    ]
                );
        }

        toast(__('admin.Updated successfully!'), 'success')->width('400');

        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $news = News::where('category_id', $category->id)->get();
            foreach ($news as $item) {
                $item->tags()->delete();
            }
            $category->delete();
            return response(['status' => 'success', 'message' => __('admin.Deleted successfully!')]);
        } catch (\Throwable $th) {
            return response(['status' => 'error', 'message' => __('admin.Something went wrong!')]);
        }
    }
}
