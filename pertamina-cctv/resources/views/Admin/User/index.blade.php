@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">User List</h1>
	<livewire:admin.users.table />
</div>
@endsection
