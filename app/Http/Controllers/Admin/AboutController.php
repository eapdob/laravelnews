<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Language;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:about index,admin'])->only(['index']);
        $this->middleware(['permission:about update,admin'])->only(['update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.about-page.index', compact('languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'content' => ['required']
        ]);

        About::updateOrCreate(
            [
                'language' => $request->language
            ],
            [
                'content' => $request->content
            ]
        );

        toast(__('Updated successfully!'), 'success');

        return redirect()->back();
    }
}
