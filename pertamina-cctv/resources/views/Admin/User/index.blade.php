@extends('layouts.admin')
@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">User List</h1>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Nama</th>
				<th class="px-3 py-2">Email</th>
			</tr>
		</thead>
		<tbody>
			<tr><td class="px-3 py-2">-</td><td class="px-3 py-2">-</td></tr>
		</tbody>
	</table>
</div>
@endsection
