@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Edit CCTV</h1>
	<livewire:admin.cctvs.form :cctv="" />
</div>
@endsection
