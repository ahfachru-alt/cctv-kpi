@extends('layouts.app')
@section('content')
<div class="p-6">
	<h1 class="text-2xl font-semibold mb-4">Dashboard</h1>
	<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
		<x-stat title="Total Gedung" value="{{ \App\Models\Building::count() }}" color="bg-indigo-600" />
		<x-stat title="Total Ruangan" value="{{ \App\Models\Room::count() }}" color="bg-indigo-600" />
		<x-stat title="CCTV Online" value="{{ \App\Models\Cctv::where('status','online')->count() }}" color="bg-green-600" />
		<x-stat title="CCTV Offline" value="{{ \App\Models\Cctv::where('status','offline')->count() }}" color="bg-red-600" />
	</div>
</div>
@endsection
