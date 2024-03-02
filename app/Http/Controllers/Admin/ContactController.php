<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminContactUpdateRequest;
use App\Models\Contact;
use App\Models\Language;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:contact index,admin'])->only(['index']);
        $this->middleware(['permission:contact update,admin'])->only(['update']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $languages = Language::all();
        $contact = Contact::all()->first();
        $contacts = [];
        foreach ($languages as $language) {
            $contacts[$language->id] = Contact::leftJoin('contacts_description', 'contacts.id', '=', 'contacts_description.contact_id')
                ->select(
                    'contacts.id as id',
                    'contacts_description.address as address',
                )
                ->where('contacts_description.language_id', $language->id)
                ->first();
        }
        return view('admin.contact-page.index', compact('languages', 'contact', 'contacts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminContactUpdateRequest $request)
    {
        if (!empty($request->id)) {
            $contact = Contact::updateOrCreate(
                [
                    'id' => $request->id,
                    'phone' => $request->phone,
                    'email' => $request->email
                ],
            );
        } else {
            $contact = Contact::updateOrCreate(
                [
                    'phone' => $request->phone,
                    'email' => $request->email
                ]
            );
        }

        foreach ($request->description as $description) {
            $contact->description()
                ->where('contact_id', $contact->id)
                ->where('language_id', $description['language_id'])
                ->updateOrCreate(
                    [
                        'contact_id' => $contact->id,
                        'language_id' => $description['language_id'],
                    ],
                    [
                        'language_id' => $description['language_id'],
                        'address' => $description['address']
                    ]
                );
        }

        toast(__('admin.Updated successfully!'), 'success');

        return redirect()->back();
    }
}
