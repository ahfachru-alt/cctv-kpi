@extends('layouts.app')

@section('content')
<div class="p-6">
	@php /** @var \App\Models\Building $building */ /** @var \App\Models\Room $room */ @endphp
	<h1 class="text-xl font-semibold mb-1">CCTV - {{ $building->name }} / {{ $room->name }}</h1>
	<p class="text-sm text-gray-500 mb-4">Klik Live untuk menonton</p>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Nama</th>
				<th class="px-3 py-2">IP</th>
				<th class="px-3 py-2">Status</th>
				<th class="px-3 py-2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($cctvs as $c)
			<tr class="border-t border-gray-200 dark:border-gray-700">
				<td class="px-3 py-2">{{ $c->name }}</td>
				<td class="px-3 py-2">{{ $c->ip_address }}</td>
				<td class="px-3 py-2">
					@php $badge = ['online' => 'bg-green-600', 'offline' => 'bg-red-600', 'maintenance' => 'bg-yellow-500'][$c->status] ?? 'bg-gray-500'; @endphp
					<span class="inline-flex items-center px-2 py-0.5 rounded text-xs text-white {{ $badge }}">{{ ucfirst($c->status) }}</span>
				</td>
				<td class="px-3 py-2 text-right">
					<a href="{{ route('stream.hls',$c) }}" target="_blank" class="px-3 py-1 rounded bg-indigo-600 text-white">Live</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection