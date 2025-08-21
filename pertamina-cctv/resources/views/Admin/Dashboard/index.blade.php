@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-2xl font-semibold mb-4">Signal Analytics</h1>
	@php
		$online = \App\Models\Cctv::where('status','online')->count();
		$offline = \App\Models\Cctv::where('status','offline')->count();
		$maint = \App\Models\Cctv::where('status','maintenance')->count();
		$users = \App\Models\User::count();
		$buildings = \App\Models\Building::count();
		$rooms = \App\Models\Room::count();
	@endphp
	<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
		<x-stat title="Total User" color="bg-indigo-600" value="{{ $users }}" />
		<x-stat title="Gedung" color="bg-indigo-600" value="{{ $buildings }}" />
		<x-stat title="Ruangan" color="bg-indigo-600" value="{{ $rooms }}" />
		<x-stat title="CCTV Online" color="bg-green-600" value="{{ $online }}" />
		<x-stat title="CCTV Offline" color="bg-red-600" value="{{ $offline }}" />
		<x-stat title="CCTV Maintenance" color="bg-yellow-500" value="{{ $maint }}" />
	</div>
	<div class="mt-6 space-x-2">
		<a href="{{ route('export.users') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded bg-emerald-600 text-white">Download Users Excel</a>
		<a href="{{ route('export.cctvs') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded bg-indigo-600 text-white">Download CCTV Excel</a>
	</div>
</div>
@endsection
<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div>
