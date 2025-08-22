<div class="p-4">
	<div class="flex items-center justify-between mb-3 gap-2">
		<input type="text" wire:model.live="q" placeholder="Cari CCTV (nama/IP)..." class="border rounded px-3 py-2 w-72">
		<div class="flex items-center gap-2">
			<select wire:model="status" class="border rounded px-3 py-2">
				<option value="all">Semua</option>
				<option value="online">Online</option>
				<option value="offline">Offline</option>
				<option value="maintenance">Maintenance</option>
			</select>
			<a href="{{ route('admin.cctvs.create') }}" class="inline-flex items-center px-3 py-2 rounded-md font-medium text-white bg-indigo-600 hover:bg-indigo-700">Create CCTV</a>
		</div>
	</div>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Gedung</th>
				<th class="px-3 py-2">Ruang</th>
				<th class="px-3 py-2">Nama</th>
				<th class="px-3 py-2">IP</th>
				<th class="px-3 py-2">Status</th>
				<th class="px-3 py-2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($cctvs as $c)
			<tr class="border-t border-gray-200 dark:border-gray-700">
				<td class="px-3 py-2">{{ optional($c->building)->name }}</td>
				<td class="px-3 py-2">{{ optional($c->room)->name }}</td>
				<td class="px-3 py-2">{{ $c->name }}</td>
				<td class="px-3 py-2">{{ $c->ip_address }}</td>
				<td class="px-3 py-2">
					@php $badge = ['online' => 'bg-green-600', 'offline' => 'bg-red-600', 'maintenance' => 'bg-yellow-500'][$c->status] ?? 'bg-gray-500'; @endphp
					<span class="inline-flex items-center px-2 py-0.5 rounded text-xs text-white {{ $badge }}">{{ ucfirst($c->status) }}</span>
				</td>
				<td class="px-3 py-2 text-right flex gap-2 justify-end">
					<a href="{{ route('admin.cctvs.edit',$c) }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-gray-700">Edit</a>
					<a href="{{ route('stream.hls',$c) }}" class="px-2 py-1 rounded bg-emerald-600 text-white" target="_blank">Live</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-3">{{ $cctvs->links() }}</div>
</div>
