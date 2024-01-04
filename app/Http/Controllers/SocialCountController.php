<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class SocialCountController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('admin.social-count.index', compact('languages'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
