<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFooterInfoUpdateRequest;
use App\Models\FooterInfo;
use App\Models\Language;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class FooterInfoController extends Controller
{
    use FileUploadTrait;

    public function __construct()
    {
        $this->middleware(['permission:footer index,admin'])->only(['index']);
        $this->middleware(['permission:footer create,admin'])->only(['store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        $footerInfo = FooterInfo::all()->first();
        $footerInfos = [];
        foreach ($languages as $language) {
            $footerInfos[$language->id] = FooterInfo::leftJoin('footer_infos_description', 'footer_infos.id', '=', 'footer_infos_description.footer_info_id')
                ->select(
                    'footer_infos.id as id',
                    'footer_infos_description.language_id as language_id',
                    'footer_infos_description.description as description',
                    'footer_infos_description.copyright as copyright'
                )
                ->where('footer_infos_description.language_id', $language->id)
                ->first();
        }

        return view('admin.footer-info.index', compact('languages', 'footerInfo', 'footerInfos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminFooterInfoUpdateRequest $request)
    {
        $imagePath = $this->handleFileUpload($request, 'logo', !empty($request->old_logo) ? $request->old_logo : '');
        if (!empty($request->id)) {
            $footerInfo = FooterInfo::updateOrCreate(
                [
                    'id' => $request->id,
                    'logo' => !empty($imagePath) ? $imagePath : $request->old_logo
                ],
            );
        } else {
            $footerInfo = FooterInfo::updateOrCreate(
                [
                    'logo' => !empty($imagePath) ? $imagePath : $request->old_logo
                ]
            );
        }
        foreach ($request->description as $description) {
            $footerInfo->description()
                ->where('footer_info_id', $footerInfo->id)
                ->where('language_id', $description['language_id'])
                ->updateOrCreate(
                    [
                        'footer_info_id' => $footerInfo->id,
                        'language_id' => $description['language_id'],
                    ],
                    [
                        'language_id' => $description['language_id'],
                        'description' => $description['description'],
                        'copyright' => $description['copyright']
                    ]
                );
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->route('admin.footer-info.index');
    }
}
