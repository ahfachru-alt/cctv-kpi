@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Edit Contact</h1>
	<livewire:admin.contacts.form :contact="$contact" />
</div>
@endsection