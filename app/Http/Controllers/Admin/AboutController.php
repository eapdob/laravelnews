<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAboutUpdateRequest;
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
        $abouts = [];
        foreach ($languages as $language) {
            $abouts[$language->id] = About::where('language_id', $language->id)->first();
        }

        return view('admin.about-page.index', compact('languages', 'abouts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminAboutUpdateRequest $request)
    {
        foreach ($request->about as $aboutItem) {
            if (!empty($aboutItem->id)) {
                About::updateOrCreate(
                    [
                        'id' => $aboutItem['id'],
                        'language_id' => $aboutItem['language_id']
                    ],
                    [
                        'content' => $aboutItem['content']
                    ]
                );
            } else {
                About::updateOrCreate(
                    [
                        'language_id' => $aboutItem['language_id']
                    ],
                    [
                        'content' => $aboutItem['content']
                    ]
                );
            }
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }
}
