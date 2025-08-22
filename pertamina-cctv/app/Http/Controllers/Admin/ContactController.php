<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('Admin/Contact/index');
    }

    public function create()
    {
        return view('Admin/Contact/creat');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
        ]);
        $contact = Contact::create($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $contact], 201);
        }
        session()->flash('success', 'Contact created successfully');

        return redirect()->route('admin.contacts.index');
    }

    public function show(Contact $contact)
    {
        return redirect()->route('admin.contacts.edit', $contact);
    }

    public function edit(Contact $contact)
    {
        return view('Admin/Contact/edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'whatsapp' => ['nullable', 'string', 'max:50'],
            'address' => ['nullable', 'string', 'max:255'],
            'message' => ['nullable', 'string'],
        ]);
        $contact->update($validated);
        if ($request->expectsJson()) {
            return response()->json(['data' => $contact], 200);
        }
        session()->flash('success', 'Contact updated successfully');

        return redirect()->route('admin.contacts.index');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        if (request()->expectsJson()) {
            return response()->json([], 204);
        }
        session()->flash('success', 'Contact deleted');

        return back();
    }
}
