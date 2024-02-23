<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFooterGridTwoSaveRequest;
use App\Models\FooterGridTwo;
use App\Models\FooterTitle;
use App\Models\Language;
use Illuminate\Http\Request;

class FooterGridTwoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:footer index,admin'])->only(['index']);
        $this->middleware(['permission:footer create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:footer update,admin'])->only(['edit', 'update', 'handleTitle']);
        $this->middleware(['permission:footer destroy,admin'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.footer-grid-two.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.footer-grid-two.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminFooterGridTwoSaveRequest $request)
    {
        $footerGridTwo = new FooterGridTwo();
        $footerGridTwo->language = $request->language;
        $footerGridTwo->name = $request->name;
        $footerGridTwo->url = $request->url;
        $footerGridTwo->status = $request->status;
        $footerGridTwo->save();

        toast(__('admin.Created successfully!'), 'success');

        return redirect()->route('admin.footer-grid-two.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $languages = Language::all();
        $footerGridTwo = FooterGridTwo::findOrFail($id);
        return view('admin.footer-grid-two.edit', compact('footerGridTwo', 'languages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $footerGridTwo = FooterGridTwo::findOrFail($id);
        return view('admin.footer-grid-two.edit', compact('footerGridTwo', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminFooterGridTwoSaveRequest $request, string $id)
    {
        $footer = FooterGridTwo::findOrFail($id);
        $footer->language = $request->language;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->route('admin.footer-grid-two.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterGridTwo::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => __('admin.Deleted successfully!')]);
    }

    public function handleTitle(Request $request)
    {
        $request->validate([
            'title' => [
                'required',
                'max:255'
            ]
        ]);

        FooterTitle::updateOrCreate([
            'key' => 'grid_two_title',
            'language' => $request->language,
            'value' => $request->title
        ]);

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();

    }
}
