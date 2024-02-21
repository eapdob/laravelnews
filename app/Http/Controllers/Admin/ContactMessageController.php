<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Models\ReceiveMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactMessageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:contact message index,admin'])->only(['index']);
        $this->middleware(['permission:contact message update,admin'])->only(['sendReply']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $messages = ReceiveMail::all();
        return view('admin.contact-message.index', compact('messages'));
    }

    public function sendReply(Request $request)
    {
        $request->validate([
            'subject' => ['required', 'max:255'],
            'message' => ['required']
        ]);

        try {
            $contact = Contact::where('language', 'en')->first();

            Mail::to($request->email)->send( new ContactMail($request->subject, $request->message, $contact->email));

            $makeReplied = ReceiveMail::find($request->message_id);
            $makeReplied->replied = 1;
            $makeReplied->save();

            toast(__('admin.mail_sent_successfully'), 'success');

            return redirect()->back();
        } catch (\Throwable $th) {
            toast($th->getMessage(), 'error');

            return redirect()->back();
        }
    }
}
