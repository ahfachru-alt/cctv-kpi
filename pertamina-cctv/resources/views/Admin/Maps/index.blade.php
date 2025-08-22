@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Buildings (Maps)</h1>
	@if(session('success'))
		<div class="mb-4 rounded border border-emerald-200 bg-emerald-50 text-emerald-800 px-4 py-2">{{ session('success') }}</div>
	@endif
	<livewire:admin.buildings.table />
</div>
@endsection