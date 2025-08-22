<div class="p-4">
	<div class="flex items-center justify-between mb-3">
		<input type="text" wire:model.live="q" placeholder="Cari gedung..." class="border rounded px-3 py-2 w-72">
	</div>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Gedung</th>
				<th class="px-3 py-2">Jumlah Ruang</th>
				<th class="px-3 py-2">Jumlah CCTV</th>
				<th class="px-3 py-2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($buildings as $b)
			<tr class="border-t border-gray-200 dark:border-gray-700">
				<td class="px-3 py-2">{{ $b->name }}</td>
				<td class="px-3 py-2">{{ $b->rooms_count }}</td>
				<td class="px-3 py-2">{{ $b->cctvs_count }}</td>
				<td class="px-3 py-2 text-right flex gap-2 justify-end">
					<a href="{{ route('admin.buildings.edit',$b) }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-gray-700">Edit Gedung</a>
					<a href="{{ route('admin.rooms.index') }}" class="px-2 py-1 rounded bg-indigo-600 text-white">Lihat Ruangan</a>
					<a href="{{ route('admin.cctvs.index') }}" class="px-2 py-1 rounded bg-emerald-600 text-white">Lihat CCTV</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-3">{{ $buildings->links() }}</div>
</div>
