<?php

namespace App\Livewire\Admin\Contacts;

use App\Models\Contact;
use Livewire\Component;

class Form extends Component
{
	public ?Contact $contact = null;
	public string $name = '';
	public string $email = '';
	public string $phone = '';
	public string $whatsapp = '';
	public string $address = '';
	public string $message = '';

	public function mount(?Contact $contact = null)
	{
		$this->contact = $contact;
		if ($contact) {
			$this->name = $contact->name;
			$this->email = (string)$contact->email;
			$this->phone = (string)$contact->phone;
			$this->whatsapp = (string)$contact->whatsapp;
			$this->address = (string)$contact->address;
			$this->message = (string)$contact->message;
		}
	}

	public function save()
	{
		$data = $this->validate([
			'name' => 'required|string|max:255',
			'email' => 'nullable|email|max:255',
			'phone' => 'nullable|string|max:50',
			'whatsapp' => 'nullable|string|max:50',
			'address' => 'nullable|string|max:255',
			'message' => 'nullable|string',
		]);
		if ($this->contact) {
			$this->contact->update($data);
			session()->flash('success', 'Contact updated successfully');
		} else {
			Contact::create($data);
			session()->flash('success', 'Contact created successfully');
		}
		return redirect()->route('admin.contacts.index');
	}

	public function render()
	{
		return view('livewire.admin.contacts.form');
	}
}
