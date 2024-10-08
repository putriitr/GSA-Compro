<?php
namespace App\Http\Controllers;

use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $contacts = ContactPage::all();
        return view('Member.Contact.contact');
    }

    public function create()
    {
        return view('contact.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'subject' => 'nullable',
            'message' => 'required',
        ]);

        ContactPage::create($request->all());
        return redirect()->route('contact.index')->with('success', 'Message sent successfully!');
    }

    public function show(ContactPage $contactPage)
    {
        return view('contact.show', compact('contactPage'));
    }

    public function edit(ContactPage $contactPage)
    {
        return view('contact.edit', compact('contactPage'));
    }

    public function update(Request $request, ContactPage $contactPage)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'subject' => 'nullable',
            'message' => 'required',
        ]);

        $contactPage->update($request->all());
        return redirect()->route('contact.index')->with('success', 'Message updated successfully!');
    }

    public function destroy(ContactPage $contactPage)
    {
        $contactPage->delete();
        return redirect()->route('contact.index')->with('success', 'Message deleted successfully!');
    }
}
