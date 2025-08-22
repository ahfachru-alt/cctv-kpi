<div class="p-4">
	<div class="flex items-center justify-between mb-3">
		<input type="text" wire:model.live="q" placeholder="Cari nama/email..." class="border rounded px-3 py-2 w-72">
		<a href="{{ route('admin.users.create') }}" class="px-3 py-2 rounded bg-indigo-600 text-white">Create User</a>
	</div>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Nama</th>
				<th class="px-3 py-2">Email</th>
				<th class="px-3 py-2">Last Login</th>
				<th class="px-3 py-2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $u)
			<tr class="border-t border-gray-200 dark:border-gray-700">
				<td class="px-3 py-2">{{ $u->name }}</td>
				<td class="px-3 py-2">{{ $u->email }}</td>
				<td class="px-3 py-2">{{ optional($u->last_login_at)->diffForHumans() ?? '-' }}</td>
				<td class="px-3 py-2 text-right">
					<a href="{{ route('admin.users.edit',$u) }}" class="px-2 py-1 rounded bg-gray-200 dark:bg-gray-700">Edit</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-3">{{ $users->links() }}</div>
</div>
