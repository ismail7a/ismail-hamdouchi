<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Bach ay wa7d ysift message mn l-welcome page
    public function store(Request $request) {
        $data = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string|min:5',
        ]);

        Contact::create($data);

        return back()->with('success', 'Your message has been sent!');
    }
  public function destroy($id)
{
    $message = \App\Models\Contact::findOrFail($id);
    $message->delete();

    return back()->with('success', 'Message deleted!');
}

    // Bach nta tchouf l-messages f l-profile dyalk
    public function index() {
        $messages = Contact::latest()->get();
        return view('profile.messages', compact('messages'));
    }
}
