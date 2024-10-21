<?php

namespace App\Http\Controllers;

use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $contacts = ContactPage::all();
        return view('Member.Contact.contact', compact('contacts'));
    }

    public function create()
    {
        return view('Member.Contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^62[0-9]{1,13}$/|max:13',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        ContactPage::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contact.index')->with('success', 'Message sent successfully!');
    }

    public function show(ContactPage $contactPage)
    {
        return view('Member.Contact.show', compact('contactPage'));
    }

    public function edit(ContactPage $contactPage)
    {
        return view('Member.Contact.edit', compact('contactPage'));
    }

    public function update(Request $request, ContactPage $contactPage)
    {
        $request->validate([
            'first_name' => 'required|string|maxc:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|regex:/^62[0-9]{1,13}$/|max:13',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        $contactPage->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company' => $request->company,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contact.index')->with('success', 'Message updated successfully!');
    }

    public function destroy(ContactPage $contactPage)
    {
        $contactPage->delete();
        return redirect()->route('contact.index')->with('success', 'Message deleted successfully!');
    }
}
