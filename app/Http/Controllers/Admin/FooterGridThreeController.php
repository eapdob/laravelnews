<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFooterGridThreeSaveRequest;
use App\Models\FooterGridThree;
use App\Models\Language;

class FooterGridThreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.footer-grid-three.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.footer-grid-three.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminFooterGridThreeSaveRequest $request)
    {
        $footerGridThree = new FooterGridThree();
        $footerGridThree->language = $request->language;
        $footerGridThree->name = $request->name;
        $footerGridThree->url = $request->url;
        $footerGridThree->status = $request->status;
        $footerGridThree->save();

        toast(__('admin.created_successfully'), 'success');

        return redirect()->route('admin.footer-grid-three.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $languages = Language::all();
        $footerGridThree = FooterGridThree::findOrFail($id);
        return view('admin.footer-grid-three.edit', compact('footerGridThree', 'languages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $footerGridThree = FooterGridThree::findOrFail($id);
        return view('admin.footer-grid-three.edit', compact('footerGridThree', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminFooterGridThreeSaveRequest $request, string $id)
    {
        $footer = FooterGridThree::findOrFail($id);
        $footer->language = $request->language;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();

        toast(__('admin.updated_successfully'), 'success');

        return redirect()->route('admin.footer-grid-three.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterGridThree::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => __('admin.deleted_successfully')]);
    }
}
