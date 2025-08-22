@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Edit User</h1>
	<livewire:admin.users.form :user="$user" />
</div>
@endsection