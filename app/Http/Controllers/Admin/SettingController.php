<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminGeneralSettingUpdateRequest;
use App\Http\Requests\AdminSeoSettingUpdateRequest;
use App\Models\Language;
use App\Models\Setting;
use App\Traits\FileUploadTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:setting index,admin'])->only(['index']);
        $this->middleware(['permission:setting update,admin'])->only(['updateGeneralSetting', 'updateSeoSetting', 'updateAppearanceSetting']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        $settingsMain = [];
        foreach ($languages as $language) {
            $settingsTmp = Setting::select(
                'value as site_name',
            )->where('key', 'site_name_' . $language->id)->first();
            $siteName = $settingsTmp->site_name ?? '';

            $settingsTmp = Setting::select(
                'value as site_seo_title',
            )->where('key', 'site_seo_title_' . $language->id)->first();
            $siteSeoTitle = $settingsTmp->site_seo_title ?? '';

            $settingsTmp = Setting::select(
                'value as site_seo_description',
            )->where('key', 'site_seo_description_' . $language->id)->first();
            $siteSeoDescription = $settingsTmp->site_seo_description ?? '';

            $settingsTmp = Setting::select(
                'value as site_seo_keywords',
            )->where('key', 'site_seo_keywords_' . $language->id)->first();
            $siteSeoKeywords = $settingsTmp->site_seo_keywords ?? '';

            $settingsMain[$language->id] = [
                'site_name' => $siteName,
                'site_seo_title' => $siteSeoTitle,
                'site_seo_description' => $siteSeoDescription,
                'site_seo_keywords' => $siteSeoKeywords
            ];
        }
        return view('admin.setting.index', compact('languages', 'settingsMain'));
    }

    function updateGeneralSetting(AdminGeneralSettingUpdateRequest $request): RedirectResponse
    {
        $logoPath = $this->handleFileUpload($request, 'site_logo', $request->old_site_logo);
        $logoPath = !empty($logoPath) ? $logoPath : $request->old_site_logo;
        Setting::updateOrCreate(
            ['key' => 'site_logo'],
            ['value' => $logoPath]
        );

        $faviconPath = $this->handleFileUpload($request, 'site_favicon', $request->old_site_favicon);
        $faviconPath = !empty($faviconPath) ? $faviconPath : $request->old_site_favicon;
        Setting::updateOrCreate(
            ['key' => 'site_favicon'],
            ['value' => $faviconPath]
        );

        foreach ($request->settings as $setting) {
            Setting::updateOrCreate(
                ['key' => 'site_name_'. $setting['language_id']],
                ['value' => $setting['site_name']]
            );
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }

    function updateSeoSetting(AdminSeoSettingUpdateRequest $request): RedirectResponse
    {
        foreach ($request->settings as $setting) {
            Setting::updateOrCreate(
                ['key' => 'site_seo_title_'. $setting['language_id']],
                ['value' => $setting['site_seo_title']]
            );

            Setting::updateOrCreate(
                ['key' => 'site_seo_description_'. $setting['language_id']],
                ['value' => $setting['site_seo_description']]
            );

            Setting::updateOrCreate(
                ['key' => 'site_seo_keywords_'. $setting['language_id']],
                ['value' => $setting['site_seo_keywords']]
            );
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }

    function updateAppearanceSetting(Request $request): RedirectResponse
    {
        $request->validate([
            'site_color' => ['required', 'max:200']
        ]);

        Setting::updateOrCreate(
            ['key' => 'site_color'],
            ['value' => $request->site_color]
        );

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }

    function updateMicrosoftApiSetting(Request $request): RedirectResponse
    {
        $request->validate([
            'site_microsoft_api_host' => ['required'],
            'site_microsoft_api_key' => ['required'],
        ]);

        Setting::updateOrCreate(
            ['key' => 'site_microsoft_api_host'],
            ['value' => $request->site_microsoft_api_host]
        );

        Setting::updateOrCreate(
            ['key' => 'site_microsoft_api_key'],
            ['value' => $request->site_microsoft_api_key]
        );

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }
}
