<?php

namespace App\Http\Controllers;

use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::get()->all();

        return view('contacts.index', compact('contacts'));
    }

    public function store()
    {
        Contact::create(request()->all());

        return redirect(route('contacts.index'));
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show', compact('contact'));
    }
}
