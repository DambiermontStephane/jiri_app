<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;
use phpDocumentor\Reflection\Types\Mixed_;
use PhpParser\Node\Scalar\String_;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'tel' => 'nullable',
            'avatar' => 'nullable|image'
        ]);

        if ($request->hasFile('avatar')) {
            $image = Image::read($validated['avatar'])
                ->resize(300, 300)
                ->toJpeg(80);

            $file_name = 'contact_' . uniqid() . '_300x300.jpg';
            $path = "contacts/$file_name";
            Storage::disk('public')->put($path, $image->toString());
            $validated['avatar'] = $path;
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

    public function destroy(Contact $contact)
    {
        Contact::destroy($contact->id);
        return redirect(route('contacts.index'));
    }

    public function edit(String $id)
    {
        $contact = Contact::findOrFail($id);
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, String $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->avatar = $request->input('storage/contacts'. $contact->avatar);
        $contact->tel = $request->input('tel');

        $contact->save();
        return redirect(route('contacts.show', compact('contact')));
    }
}
