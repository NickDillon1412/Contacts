<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Contacts/Contacts', [
            'contacts' => Contact::query()->where('user_id', '=', auth()->user()->id)->when($request->search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })->latest()->get(),
            'filters' => $request->only('search')
        ]);
    }

    public function create()
    {
        return Inertia::render('Contacts/ContactCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone' => 'required|numeric|min:10'
        ]);

        Contact::create([
            'user_id' => auth()->user()->id,
            'image' => $request->file('image')->store('images', 'public'),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        return redirect()->route('contacts.list');
    }

    public function edit(Contact $contact)
    {
        return Inertia::render('Contacts/ContactEdit', [
            'contact' => [
                'id' => $contact->id,
                'initial' => substr($contact->name, 0, 1),
                'image' => asset('storage/' . $contact->image),
                'name' => $contact->name,
                'email' => $contact->email,
                'phone' => $contact->phone,
            ]
        ]);
    }
    public function update(Request $request, Contact $contact)
    {

        $attributes = $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255',
            'phone' => 'numeric|min:10'
        ]);

        if ($request->hasFile('image')) {
            $attributes['image'] = $request->validate([
                'image' => 'image'
            ]);
            $oldImage = $contact->image;
            Storage::delete($oldImage);

            $pathToImage = $request->file('image')->store('images', 'public');
            $attributes['image'] = $pathToImage;
        }

        $contact->update($attributes);

        return redirect()->route('contacts.list');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.list');
    }
}
