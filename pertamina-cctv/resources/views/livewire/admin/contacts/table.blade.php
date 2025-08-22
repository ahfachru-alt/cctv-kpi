<div class="p-4">
	<div class="flex items-center justify-between mb-3">
		<input type="text" wire:model.live="q" placeholder="Cari kontak..." class="border rounded px-3 py-2 w-72">
		<a href="{{ route('admin.contacts.create') }}" class="px-3 py-2 rounded bg-indigo-600 text-white">Create Contact</a>
	</div>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Nama</th>
				<th class="px-3 py-2">Email</th>
				<th class="px-3 py-2">No Telp</th>
				<th class="px-3 py-2">WhatsApp</th>
				<th class="px-3 py-2">Alamat</th>
				<th class="px-3 py-2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($contacts as $c)
			<tr class="border-t border-gray-200 dark:border-gray-700">
				<td class="px-3 py-2">{{ $c->name }}</td>
				<td class="px-3 py-2">{{ $c->email }}</td>
				<td class="px-3 py-2">{{ $c->phone }}</td>
				<td class="px-3 py-2">{{ $c->whatsapp }}</td>
				<td class="px-3 py-2">{{ $c->address }}</td>
				<td class="px-3 py-2 text-right">
					<a href="{{ route('admin.contacts.edit',$c) }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-gray-700">Edit</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-3">{{ $contacts->links() }}</div>
</div>
