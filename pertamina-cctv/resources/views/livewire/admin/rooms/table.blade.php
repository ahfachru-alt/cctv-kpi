<div class="p-4">
	<div class="flex items-center justify-between mb-3">
		<input type="text" wire:model.live="q" placeholder="Cari ruangan..." class="border rounded px-3 py-2 w-72">
		<a href="{{ route('admin.rooms.create') }}" class="px-3 py-2 rounded bg-indigo-600 text-white">Create Room</a>
	</div>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Gedung</th>
				<th class="px-3 py-2">Nama Ruang</th>
				<th class="px-3 py-2">Lantai</th>
				<th class="px-3 py-2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($rooms as $r)
			<tr class="border-t border-gray-200 dark:border-gray-700">
				<td class="px-3 py-2">{{ optional($r->building)->name }}</td>
				<td class="px-3 py-2">{{ $r->name }}</td>
				<td class="px-3 py-2">{{ $r->floor }}</td>
				<td class="px-3 py-2 text-right">
					<a href="{{ route('admin.rooms.edit',$r) }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-gray-700">Edit</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-3">{{ $rooms->links() }}</div>
</div>
