@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Edit Room</h1>
	<livewire:admin.rooms.form :room="$room" />
</div>
@endsection