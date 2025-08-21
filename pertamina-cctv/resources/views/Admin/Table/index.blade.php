@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Table Users Online / Offline</h1>
	<div class="mb-4 space-x-2">
		<a href="{{ route('export.users') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-emerald-600 text-white">Download Users Excel</a>
		<a href="{{ route('export.cctvs') }}" class="inline-flex items-center gap-2 px-3 py-2 rounded bg-indigo-600 text-white">Download CCTV Excel</a>
	</div>
	<table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Name</th>
				<th class="px-3 py-2">Email</th>
				<th class="px-3 py-2">Status</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="px-3 py-2">-</td>
				<td class="px-3 py-2">-</td>
				<td class="px-3 py-2">-</td>
			</tr>
		</tbody>
	</table>
</div>
@endsection