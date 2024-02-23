<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\HomeSectionSetting;
use App\Models\News;
use App\Models\ReceiveMail;
use App\Models\SocialCount;
use App\Models\Subscriber;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where(['is_breaking_news' => 1])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(10)->get();
        $heroSlider = News::with(['category', 'author'])
            ->where('show_at_slider', 1)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'DESC')->take(7)
            ->get();
        $recentNews = News::with(['category', 'author'])->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')->take(6)->get();
        $popularNews = News::with(['category'])->where('show_at_popular', 1)
            ->activeEntries()->withLocalize()
            ->orderBy('updated_at', 'DESC')->take(4)->get();
        $homeSectionSetting = HomeSectionSetting::where('language', getLanguage())->first();
        $categorySectionOne = News::where('category_id', $homeSectionSetting->category_section_one)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();
        $categorySectionTwo = News::where('category_id', $homeSectionSetting->category_section_two)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(8)
            ->get();
        $categorySectionThree = News::where('category_id', $homeSectionSetting->category_section_three)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(6)
            ->get();
        $categorySectionFour = News::where('category_id', $homeSectionSetting->category_section_four)
            ->activeEntries()->withLocalize()
            ->orderBy('id', 'DESC')
            ->take(6)
            ->get();
        $mostViewedPosts = News::activeEntries()->withLocalize()
            ->orderBy('views', 'DESC')
            ->take(3)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLanguage()])->get();

        $mostCommonTags = $this->mostCommonTags();

        $ad = Ad::first();

        return view(
            'frontend.home.index',
            compact(
                'breakingNews',
                'heroSlider',
                'recentNews',
                'popularNews',
                'categorySectionOne',
                'categorySectionTwo',
                'categorySectionThree',
                'categorySectionFour',
                'mostViewedPosts',
                'socialCounts',
                'mostCommonTags',
                'ad'
            )
        );
    }

    public function showNews(string $slug)
    {
        $news = News::with(['author', 'tags', 'comments'])->where('slug', $slug)
            ->activeEntries()->withLocalize()
            ->first();

        $recentNews = News::with(['category', 'author'])->where('slug', '!=', $news->slug)
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();

        $nextPost = News::where('id', '>', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'asc')->first();

        $previousPost = News::where('id', '<', $news->id)
            ->activeEntries()
            ->withLocalize()
            ->orderBy('id', 'desc')->first();

        $relatedPosts = News::where('slug', '!=', $news->slug)
            ->where('category_id', $news->category_id)
            ->activeEntries()
            ->withLocalize()
            ->take(5)
            ->get();

        $socialCounts = SocialCount::where(['status' => 1, 'language' => getLanguage()])->get();

        $mostCommonTags = $this->mostCommonTags();

        $this->countView($news);

        $ad = Ad::first();

        return view(
            'frontend.news-details',
            compact(
                'news',
                'recentNews',
                'mostCommonTags',
                'nextPost',
                'previousPost',
                'relatedPosts',
                'socialCounts',
                'ad'
            )
        );
    }

    public function news(Request $request)
    {

        $news = News::query();

        $news->when($request->has('tag') && !empty($request->tag), function ($query) use ($request) {
            $query->whereHas('tags', function ($query) use ($request) {
                $query->where('name', $request->tag);
            });
        });

        $news->when($request->has('category') && !empty($request->category), function ($query) use ($request) {
            $query->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        });

        $news->when($request->has('search') && !empty($request->search), function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('content', 'like', '%' . $request->search . '%');
            })->orWhereHas('category', function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            });
        });

        $news = $news->activeEntries()->withLocalize()->paginate(20);

        $recentNews = News::with(['category', 'author'])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(4)->get();
        $mostCommonTags = $this->mostCommonTags();

        $categories = Category::where(['status' => 1, 'language' => getLanguage()])->get();

        $ad = Ad::first();

        return view(
            'frontend.news',
            compact(
                'news',
                'recentNews',
                'mostCommonTags',
                'categories',
                'ad'
            )
        );
    }

    public function countView($news)
    {
        if (session()->has('viewed_posts')) {
            $postIds = session('viewed_posts');

            if (!in_array($news->id, $postIds)) {
                $postIds[] = $news->id;
                $news->increment('views');
            }
            session(['viewed_posts' => $postIds]);
        } else {
            session(['viewed_posts' => [$news->id]]);

            $news->increment('views');
        }
    }

    public function mostCommonTags()
    {
        return Tag::select('name', \DB::raw('COUNT(*) as count'))
            ->where('language', getLanguage())
            ->groupBy('name')
            ->orderByDesc('count')
            ->take(15)
            ->get();
    }

    public function handleComment(Request $request)
    {
        $request->validate([
            'comment' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->comment;
        $comment->save();

        toast(__('Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function handleReply(Request $request)
    {
        $request->validate([
            'replay' => ['required', 'string', 'max:1000']
        ]);

        $comment = new Comment();
        $comment->news_id = $request->news_id;
        $comment->user_id = Auth::user()->id;
        $comment->parent_id = $request->parent_id;
        $comment->comment = $request->reply;
        $comment->save();

        toast(__('Comment added successfully!'), 'success');

        return redirect()->back();
    }

    public function commentDestroy(Request $request)
    {
        $comment = Comment::findOrFail($request->id);
        if (Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return response(['status' => 'success', 'message' => __('Deleted successfully!')]);
        }

        return response(['status' => 'error', 'message' => __('Can\'t delete not your own comment!')]);
    }

    public function SubscribeNewsletter(Request $request)
    {
        $request->validate(
            [
                'email' => [
                    'required',
                    'email',
                    'max:255',
                    'unique:subscribers,email'
                ]
            ],
            [
                'email.unique' => __('Email is already subscribed!')
            ]
        );

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response([
            'status' => 'success',
            'message' => __('Subscribed successfully!')
        ]);
    }

    public function about()
    {
        $about = About::where('language', getLanguage())->first();
        return view('frontend.about', compact('about'));
    }

    public function contact()
    {
        $contact = Contact::where('language', getLanguage())->first();
        return view('frontend.contact', compact('contact'));
    }

    public function handleContact(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max:500']
        ]);

        try {
            $toMail = Contact::where('language', 'en')->first();

            Mail::to($toMail->email)->send(new ContactMail($request->subject, $request->message, $request->email));

            $mail = new ReceiveMail();
            $mail->email = $request->email;
            $mail->subject = $request->subject;
            $mail->message = $request->message;
            $mail->save();
        } catch (\Exception $e) {
            toast(__($e->getMessage()));
        }

        toast(__('Message sent successfully!'), 'success');

        return redirect()->back();
    }
}
