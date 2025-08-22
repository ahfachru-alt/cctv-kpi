@extends('layouts.app')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Gedung</h1>
	@php $buildings = \App\Models\Building::orderBy('name')->get(); @endphp
	<div class="mb-3"><input type="text" id="q" placeholder="Cari gedung..." class="border rounded px-3 py-2 w-72" oninput="filterList()"></div>
	<ul id="list" class="divide-y divide-gray-200 dark:divide-gray-700 bg-white dark:bg-gray-800 rounded">
		@foreach($buildings as $b)
		<li class="p-3 flex items-center justify-between">
			<div>
				<div class="font-medium">{{ $b->name }}</div>
				<div class="text-sm text-gray-500">Lat: {{ $b->latitude }}, Lng: {{ $b->longitude }}</div>
			</div>
			<a href="{{ route('user.rooms', $b) }}" class="px-3 py-2 rounded bg-indigo-600 text-white">Buka Ruangan</a>
		</li>
		@endforeach
	</ul>
</div>
<script>
function filterList(){
	const term = document.getElementById('q').value.toLowerCase();
	document.querySelectorAll('#list li').forEach(li => {
		li.style.display = li.innerText.toLowerCase().includes(term) ? '' : 'none';
	});
}
</script>
@endsection