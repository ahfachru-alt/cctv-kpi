@extends('layouts.app')

@section('content')
<div class="p-6">
	<h1 class="text-2xl font-semibold mb-6">Dashboard</h1>
	@php
		$online = \App\Models\Cctv::where('status','online')->count();
		$offline = \App\Models\Cctv::where('status','offline')->count();
		$maint = \App\Models\Cctv::where('status','maintenance')->count();
		$buildings = \App\Models\Building::count();
		$rooms = \App\Models\Room::count();
	@endphp
	<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-4">
		<x-stat title="Gedung" color="bg-indigo-600" value="{{ $buildings }}" />
		<x-stat title="Ruangan" color="bg-indigo-600" value="{{ $rooms }}" />
		<x-stat title="CCTV Online" color="bg-green-600" value="{{ $online }}" />
		<x-stat title="CCTV Offline" color="bg-red-600" value="{{ $offline }}" />
		<x-stat title="Maintenance" color="bg-yellow-500" value="{{ $maint }}" />
	</div>
	<div class="mt-6 flex items-center gap-3">
		<a href="{{ route('user.maps') }}" class="inline-flex items-center px-4 py-2 rounded bg-indigo-600 text-white">Buka Maps</a>
		<a href="{{ route('user.locations') }}" class="inline-flex items-center px-4 py-2 rounded bg-gray-200 dark:bg-gray-700">Jelajahi Lokasi</a>
		<a href="{{ route('chat.panel') }}" class="inline-flex items-center px-4 py-2 rounded bg-emerald-600 text-white">Pesan</a>
	</div>
</div>
@endsection
