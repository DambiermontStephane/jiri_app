<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactAvatarRequest;
use App\Jobs\ProcessUploadedContactAvatar;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(StoreContactAvatarRequest $request)
    {
        $validated = $request->validated();
        $new_original_file_name = uniqid('', true) . config('contactsavatars.avatar_type');
        $full_path_to_of_original = Storage::disk('public')->putFileAs(config('contactsavatars.original_path'), $validated['avatar'], $new_original_file_name);

        if ($validated['avatar']) {
            if ($full_path_to_of_original) {
                $validated['avatar'] = $new_original_file_name;
                ProcessUploadedContactAvatar::dispatch($full_path_to_of_original, $new_original_file_name);
            }
            else {
                $validated['avatar'] = '';
            }
        }

        $contact = auth()->user()->contacts()->create($validated);

        return redirect(route('contacts.show', compact('contact')));
    }

    public function index()
    {
        $contacts = Contact::get()->all();

        return view('contacts.index', compact('contacts'));
    }

    public function show(string $id)
    {
        $contact = Contact::findOrFail($id);

        return view('contacts.show', compact('contact'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function edit(string $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, string $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->avatar = $request->input('avatar');
        $contact->tel = $request->input('tel');

        $contact->save();
        return redirect(route('contacts.show', compact('contact')));
    }

    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        return redirect(route('contacts.index'));
    }
}
