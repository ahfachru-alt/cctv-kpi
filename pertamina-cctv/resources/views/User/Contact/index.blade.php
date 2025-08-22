@extends('layouts.app')

@section('content')
<div class="p-6">
	<h1 class="text-xl font-semibold mb-4">Kontak</h1>
	@php $contacts = \App\Models\Contact::orderBy('name')->get(); @endphp
	<div class="overflow-x-auto">
		<table class="min-w-full bg-white dark:bg-gray-800 border">
			<thead>
				<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
					<th class="px-3 py-2">Nama</th>
					<th class="px-3 py-2">Email</th>
					<th class="px-3 py-2">Telp</th>
					<th class="px-3 py-2">WhatsApp</th>
					<th class="px-3 py-2">Alamat</th>
				</tr>
			</thead>
			<tbody>
				@foreach($contacts as $c)
				<tr class="border-t border-gray-200 dark:border-gray-700">
					<td class="px-3 py-2">{{ $c->name }}</td>
					<td class="px-3 py-2"><a class="text-indigo-600" href="mailto:{{ $c->email }}">{{ $c->email }}</a></td>
					<td class="px-3 py-2"><a class="text-indigo-600" href="tel:{{ $c->phone }}">{{ $c->phone }}</a></td>
					<td class="px-3 py-2"><a class="text-emerald-600" target="_blank" href="https://wa.me/{{ preg_replace('/[^0-9]/','',$c->whatsapp) }}">{{ $c->whatsapp }}</a></td>
					<td class="px-3 py-2"><a class="text-indigo-600" target="_blank" href="https://maps.google.com/?q={{ urlencode($c->address) }}">{{ $c->address }}</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection