<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminHomeSectionSettingUpdateRequest;
use App\Models\Category;
use App\Models\HomeSectionSetting;
use App\Models\Language;

class HomeSectionSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:home section index,admin'])->only(['index']);
        $this->middleware(['permission:home section update,admin'])->only(['update']);
    }

    public function index()
    {
        $languages = Language::all();
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
        $homeSectionSettings = [];
        foreach ($languages as $language) {
            $homeSectionSettings[$language->id] = HomeSectionSetting::where('language_id', $language->id)->first();
        }

        return view('admin.home-section-setting.index', compact('languages', 'categories', 'homeSectionSettings'));
    }

    public function update(AdminHomeSectionSettingUpdateRequest $request)
    {
        foreach ($request->homeSectionSetting as $homeSectionSetting) {
            if (!empty($homeSectionSetting->id)) {
                HomeSectionSetting::updateOrCreate(
                    [
                        'id' => $homeSectionSetting['id'],
                        'language_id' => $homeSectionSetting['language_id']
                    ],
                    [
                        'language_id' => $homeSectionSetting['language_id'],
                        'category_section_one' => $homeSectionSetting['category_section_one'],
                        'category_section_two' => $homeSectionSetting['category_section_two'],
                        'category_section_three' => $homeSectionSetting['category_section_three'],
                        'category_section_four' => $homeSectionSetting['category_section_four'],
                    ],
                );
            } else {
                HomeSectionSetting::updateOrCreate(
                    [
                        'language_id' => $homeSectionSetting['language_id']
                    ],
                    [
                        'language_id' => $homeSectionSetting['language_id'],
                        'category_section_one' => $homeSectionSetting['category_section_one'],
                        'category_section_two' => $homeSectionSetting['category_section_two'],
                        'category_section_three' => $homeSectionSetting['category_section_three'],
                        'category_section_four' => $homeSectionSetting['category_section_four'],
                    ],
                );
            }
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }
}
