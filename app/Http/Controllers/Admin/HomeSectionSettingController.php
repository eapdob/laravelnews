<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;

class HomeSectionSettingController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.home-section-setting.index', compact('languages'));
    }
}
