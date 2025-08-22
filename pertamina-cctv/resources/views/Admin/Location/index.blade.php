@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Rooms</h1>
	<livewire:admin.rooms.table />
</div>
@endsection