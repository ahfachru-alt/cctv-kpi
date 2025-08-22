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
		return back();
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
		return back();
	}

	public function destroy(Contact $contact)
	{
		$contact->delete();
		return back();
	}
}
