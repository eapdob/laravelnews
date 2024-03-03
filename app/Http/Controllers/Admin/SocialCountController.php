<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSocialCountStoreRequest;
use App\Http\Requests\AdminSocialCountUpdateRequest;
use App\Models\Language;
use App\Models\SocialCount;
use Illuminate\Http\Request;

class SocialCountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:social count index,admin'])->only(['index']);
        $this->middleware(['permission:social count create,admin'])->only(['create', 'store']);
        $this->middleware(['permission:social count update,admin'])->only(['edit', 'update']);
        $this->middleware(['permission:social count delete,admin'])->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $socialCounts = SocialCount::leftJoin('social_counts_description', 'social_counts.id', '=', 'social_counts_description.social_count_id')
            ->select(
                'social_counts.id as id',
                'social_counts.icon as icon',
                'social_counts.url as url',
                'social_counts.status as status'
            )
            ->where('social_counts_description.language_id', getLanguageId())
            ->orderByDesc('id')
            ->get();

        return view('admin.social-count.index', compact('socialCounts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $languages = Language::all();
        return view('admin.social-count.create', compact('languages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminSocialCountStoreRequest $request)
    {
        $socialCount = new SocialCount();
        $socialCount->icon = $request->icon;
        $socialCount->url = $request->url;
        $socialCount->color = $request->color;
        $socialCount->status = $request->status;
        $socialCount->save();
        foreach ($request->description as $description) {
            $socialCount->description()
                ->create([
                    'language_id' => $description['language_id'],
                    'fan_count' => $description['fan_count'],
                    'fan_type' => $description['fan_type'],
                    'button_text' => $description['button_text']
                ]);
        }

        toast(__('admin.Created successfully!'), 'success');

        return redirect()->route('admin.social-count.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $languages = Language::all();
        $socialCount = [];
        foreach ($languages as $language) {
            $socialCount[$language->id] = SocialCount::leftJoin('social_counts_description', 'social_counts.id', '=', 'social_counts_description.social_count_id')
                ->select(
                    'social_counts.id as id',
                    'social_counts.icon as icon',
                    'social_counts.url as url',
                    'social_counts.color as color',
                    'social_counts.status as status',
                    'social_counts_description.language_id as language_id',
                    'social_counts_description.fan_count as fan_count',
                    'social_counts_description.fan_type as fan_type',
                    'social_counts_description.button_text as button_text',
                )
                ->where('social_counts.id', $id)
                ->where('social_counts_description.language_id', $language->id)
                ->first();
        }

        return view('admin.social-count.edit', compact('languages','socialCount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminSocialCountUpdateRequest $request, string $id)
    {
        $socialCount = SocialCount::findOrFail($id);
        $socialCount->icon = $request->icon;
        $socialCount->url = $request->url;
        $socialCount->color = $request->color;
        $socialCount->status = $request->status;
        $socialCount->save();
        foreach ($request->description as $description) {
            $socialCount->description()
                ->where('social_count_id', $socialCount->id)
                ->where('language_id', $description['language_id'])
                ->updateOrCreate(
                    [
                        'social_count_id' => $socialCount->id,
                        'language_id' => $description['language_id'],
                    ],
                    [
                        'language_id' => $description['language_id'],
                        'fan_count' => $description['fan_count'],
                        'fan_type' => $description['fan_type'],
                        'button_text' => $description['button_text'],
                    ]
                );
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->route('admin.social-count.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $socialCount = SocialCount::findOrFail($id);
        $socialCount->delete();

        return response(['status' => 'success', 'message' => __('admin.Deleted successfully!')]);
    }
}
