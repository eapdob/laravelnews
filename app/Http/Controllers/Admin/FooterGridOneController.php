<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminFooterGridOneSaveRequest;
use App\Http\Requests\AdminFooterGridOneUpdateRequest;
use App\Http\Requests\AdminFooterTitleUpdateRequest;
use App\Models\FooterGridOne;
use App\Models\FooterTitle;
use App\Models\Language;
use Illuminate\Http\Request;

class FooterGridOneController extends Controller
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
        $footerTitles = [];
        foreach ($languages as $language) {
            $footerTitles[$language->id] = FooterTitle::where(['language_id' => $language->id, 'footer_grid' => 'footer_grid_one'])->first();
        }
        $footerGridOnes = FooterGridOne::leftJoin('footer_grid_ones_description', 'footer_grid_ones.id', '=', 'footer_grid_ones_description.footer_grid_one_id')
            ->select(
                'footer_grid_ones.id as id',
                'footer_grid_ones.status as status',
                'footer_grid_ones_description.name as name',
            )
            ->where('footer_grid_ones_description.language_id', getLanguageId())
            ->orderByDesc('id')
            ->get();
        return view('admin.footer-grid-one.index', compact('languages', 'footerTitles','footerGridOnes'));
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
    public function store(AdminFooterGridOneSaveRequest $request)
    {
        $footer = new FooterGridOne();
        $footer->url = $request->url;
        $footer->status = $request->status;
        $footer->save();
        foreach ($request->description as $description) {
            $footer->description()
                ->create([
                    'language_id' => $description['language_id'],
                    'name' => $description['name']
                ]);
        }

        toast(__('admin.Created successfully!'), 'success');

        return redirect()->route('admin.footer-grid-one.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $footerGridOne = [];
        foreach ($languages as $language) {
            $footerGridOne[$language->id] = FooterGridOne::leftJoin('footer_grid_ones_description', 'footer_grid_ones.id', '=', 'footer_grid_ones_description.footer_grid_one_id')
                ->select(
                    'footer_grid_ones.id as id',
                    'footer_grid_ones.status as status',
                    'footer_grid_ones.url as url',
                    'footer_grid_ones_description.name as name',
                    'footer_grid_ones_description.language_id as language_id'
                )
                ->where('footer_grid_ones.id', $id)
                ->where('footer_grid_ones_description.language_id', $language->id)
                ->first();
        }
        return view('admin.footer-grid-one.edit', compact( 'languages', 'footerGridOne'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminFooterGridOneUpdateRequest $request, string $id)
    {
        $footerGridOne = FooterGridOne::findOrFail($id);
        $footerGridOne->url = $request->url;
        $footerGridOne->status = $request->status;
        $footerGridOne->save();
        foreach ($request->description as $description) {
            $footerGridOne->description()
                ->where('footer_grid_one_id', $footerGridOne->id)
                ->where('language_id', $description['language_id'])
                ->updateOrCreate(
                    [
                        'footer_grid_one_id' => $footerGridOne->id,
                        'language_id' => $description['language_id'],
                    ],
                    [
                        'language_id' => $description['language_id'],
                        'name' => $description['name']
                    ]
                );
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->route('admin.footer-grid-one.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FooterGridOne::findOrFail($id)->delete();
        return response(['status' => 'success', 'message' => __('admin.Deleted successfully!')]);
    }

    public function handleTitle(AdminFooterTitleUpdateRequest $request)
    {
        foreach ($request->footerTitles as $footerTitle) {
            if (!empty($footerTitle['id'])) {
                FooterTitle::updateOrCreate(
                    [
                        'id' => $footerTitle['id'],
                        'footer_grid' => $footerTitle['footer_grid'],
                        'language_id' => $footerTitle['language_id']
                    ],
                    [
                        'title' => $footerTitle['title'],
                    ]
                );
            } else {
                FooterTitle::updateOrCreate(
                    [
                        'footer_grid' => $footerTitle['footer_grid'],
                        'language_id' => $footerTitle['language_id']
                    ],
                    [
                        'footer_grid' => $footerTitle['footer_grid'],
                        'title' => $footerTitle['title'],
                        'language_id' => $footerTitle['language_id']
                    ]
                );
            }
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }
}
