<div class="p-4" x-data="{ delId: null }">
	<div class="flex items-center justify-between mb-3">
		<input type="text" wire:model.live="q" placeholder="Cari ruangan..." class="border rounded px-3 py-2 w-72">
		<a href="{{ route('admin.rooms.create') }}" class="inline-flex items-center px-3 py-2 rounded-md font-medium text-white bg-indigo-600 hover:bg-indigo-700">Create Room</a>
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
				<td class="px-3 py-2 text-right flex gap-2 justify-end">
					<a href="{{ route('admin.rooms.edit',$r) }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-gray-700">Edit</a>
					<button type="button" @click="delId={{ $r->id }}" class="px-2 py-1 rounded bg-red-600 text-white">Delete</button>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-3">{{ $rooms->links() }}</div>
	<div x-show="delId" class="fixed inset-0 bg-black/50 flex items-center justify-center p-4" x-cloak>
		<div class="bg-white dark:bg-gray-800 rounded shadow p-4 w-full max-w-sm">
			<h2 class="font-semibold mb-2">Hapus Ruangan?</h2>
			<p class="text-sm text-gray-600 dark:text-gray-400 mb-4">Tindakan ini tidak dapat dibatalkan.</p>
			<div class="flex justify-end gap-2">
				<button type="button" @click="delId=null" class="px-3 py-2 border rounded">Batal</button>
				<button type="button" class="px-3 py-2 rounded bg-red-600 text-white" @click="$wire.emit('deleteRoom', delId); delId=null">Hapus</button>
			</div>
		</div>
	</div>
</div>
