@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Create Online/Offline Entry</h1>
	<div class="flex items-center gap-2 mb-4">
		<a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-indigo-600 text-white">Create User</a>
		<a href="{{ route('admin.buildings.create') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-emerald-600 text-white">Create Building</a>
		<a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-amber-600 text-white">Create Room</a>
		<a href="{{ route('admin.cctvs.create') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-fuchsia-600 text-white">Create CCTV</a>
	</div>
	<p class="text-sm text-gray-600 dark:text-gray-400">Pilih entitas yang ingin Anda buat untuk melengkapi data online/offline.</p>
</div>
@endsection