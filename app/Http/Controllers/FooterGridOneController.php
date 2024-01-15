<?php

namespace App\Http\Controllers;

use App\Http\Requests\FooterGridOneSaveRequest;
use App\Models\FooterGridOne;
use App\Models\Language;
use Illuminate\Http\Request;

class FooterGridOneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        return view('admin.footer-grid-one.index', compact('languages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.footer-grid-one.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FooterGridOneSaveRequest $request)
    {
        $footer = new FooterGridOne();
        $footer->language = $request->language;
        $footer->name = $request->name;
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();

        toast(__('admin.created_successfully'), 'success');

        return redirect()->route('admin.footer-grid-one.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $footerGridOne = FooterGridOne::findOrFail($id);
        return view('admin.footer-grid-one.edit', compact('footerGridOne', 'languages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FooterGridOneSaveRequest $request, string $id)
    {
        $footerGridOne = FooterGridOne::findOrFail($id);
        $footerGridOne->language = $request->language;
        $footerGridOne->name = $request->name;
        $footerGridOne->url = $request->url;
        $footerGridOne->status = $request->status;
        $footerGridOne->save();

        toast(__('admin.updated_successfully'), 'success');

        return redirect()->route('admin.footer-grid-one.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterGridOne::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => __('admin.deleted_successfully')]);
    }
}
