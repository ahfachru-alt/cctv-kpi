@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Edit Online/Offline Entry</h1>
	<div class="flex items-center gap-2 mb-4">
		<a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-gray-200 dark:bg-gray-700">Back to Users</a>
		<a href="{{ route('export.users') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-emerald-600 text-white">Download Users Excel</a>
	</div>
	<p class="text-sm text-gray-600 dark:text-gray-400">Gunakan halaman List untuk melakukan edit detail spesifik via tombol Edit di setiap baris.</p>
</div>
@endsection