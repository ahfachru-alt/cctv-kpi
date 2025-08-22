@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Edit Building</h1>
	<livewire:admin.buildings.form :building="$building" />
</div>
@endsection