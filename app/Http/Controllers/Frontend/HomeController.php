<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\News;

class HomeController extends Controller
{
    public function index()
    {
        $breakingNews = News::where(['is_breaking_news' => 1])
            ->activeEntries()->withLocalize()->orderBy('id', 'DESC')->take(10)->get();

        return view('frontend.home.index', compact('breakingNews'));
    }

    public function showNews(string $slug)
    {
        $news = News::with(['author'])->where('slug', $slug)
            ->activeEntries()->withLocalize()
            ->first();

        return view('frontend.news-details', compact('news'));
    }
}
