@extends('layouts.app')

@section('content')
<div class="p-6">
	@php /** @var \App\Models\Building $building */ @endphp
	<h1 class="text-xl font-semibold mb-1">Ruangan - {{ $building->name }}</h1>
	<p class="text-sm text-gray-500 mb-4">Pilih ruangan untuk melihat CCTV</p>
	<ul class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800 rounded">
		@foreach($rooms as $r)
		<li class="p-3 flex items-center justify-between">
			<div>
				<div class="font-medium">{{ $r->name }}</div>
				<div class="text-sm text-gray-500">Lantai {{ $r->floor }}</div>
			</div>
			<a href="{{ route('user.cctvs', [$building, $r]) }}" class="px-3 py-2 rounded bg-indigo-600 text-white">Lihat CCTV</a>
		</li>
		@endforeach
	</ul>
</div>
@endsection