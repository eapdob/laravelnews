<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGeneralSettingUpdateRequest;
use App\Http\Requests\AdminSeoSettingUpdateRequest;
use App\Models\Setting;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use FileUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.setting.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function updateGeneralSetting(AdminGeneralSettingUpdateRequest $request): RedirectResponse
    {
        $logoPath = $this->handleFileUpload($request, 'site_logo');
        $faviconPath = $this->handleFileUpload($request, 'site_favicon');

        Setting::updateOrCreate(
            ['key' => 'site_name'],
            ['value' => $request->site_name]
        );

        if (!empty($logoPath)) {
            Setting::updateOrCreate(
                ['key' => 'site_logo'],
                ['value' => $logoPath]
            );
        }

        if (!empty($faviconPath)) {
            Setting::updateOrCreate(
                ['key' => 'site_favicon'],
                ['value' => $faviconPath]
            );
        }

        toast(__('admin.updated_successfully'), 'success');

        return redirect()->back();
    }

    function updateSeoSetting(AdminSeoSettingUpdateRequest $request) : RedirectResponse {
        Setting::updateOrCreate(
            ['key' => 'site_seo_title'],
            ['value' => $request->site_seo_title]
        );


        Setting::updateOrCreate(
            ['key' => 'site_seo_description'],
            ['value' => $request->site_seo_description]
        );


        Setting::updateOrCreate(
            ['key' => 'site_seo_keywords'],
            ['value' => $request->site_seo_keywords]
        );


        toast(__('admin.updated_successfully'), 'success');

        return redirect()->back();
    }

    function updateAppearanceSetting(Request $request): RedirectResponse {
        $request->validate([
            'site_color' => ['required', 'max:200']
        ]);

        Setting::updateOrCreate(
            ['key' => 'site_color'],
            ['value' => $request->site_color]
        );

        toast(__('admin.updated_successfully'), 'success');

        return redirect()->back();
    }
}
