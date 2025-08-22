<div class="p-4">
	<div class="flex items-center justify-between mb-3">
		<h2 class="text-lg font-semibold">Notifications</h2>
		<button wire:click="markAllRead" class="px-3 py-2 rounded bg-gray-200 dark:bg-gray-700">Mark all read</button>
	</div>
	<table class="min-w-full bg-white dark:bg-gray-800 border">
		<thead>
			<tr class="bg-gray-50 dark:bg-gray-700 text-left text-sm">
				<th class="px-3 py-2">Message</th>
				<th class="px-3 py-2">Time</th>
				<th class="px-3 py-2">Status</th>
				<th class="px-3 py-2"></th>
			</tr>
		</thead>
		<tbody>
			@foreach($notifications as $n)
			<tr class="border-t border-gray-200 dark:border-gray-700">
				<td class="px-3 py-2">
					{{ $n->data['message'] ?? $n->type }}
				</td>
				<td class="px-3 py-2 text-sm text-gray-500">{{ $n->created_at->diffForHumans() }}</td>
				<td class="px-3 py-2">
					@if($n->read_at)
						<span class="inline-flex items-center px-2 py-0.5 rounded text-xs text-white bg-gray-500">Read</span>
					@else
						<span class="inline-flex items-center px-2 py-0.5 rounded text-xs text-white bg-indigo-600">Unread</span>
					@endif
				</td>
				<td class="px-3 py-2 text-right">
					@if(is_null($n->read_at))
						<button wire:click="markRead('{{ $n->id }}')" class="px-3 py-1 rounded bg-emerald-600 text-white">Mark read</button>
					@endif
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="mt-3">{{ $notifications->links() }}</div>
</div>