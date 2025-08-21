<div wire:poll.3s class="p-4 space-y-3">
	<div class="flex items-center gap-2">
		@if(auth()->user()->hasRole('admin'))
			<select wire:model="toUserId" class="border rounded px-2 py-1">
				<option value="">Pilih user…</option>
				@foreach($users as $u)
					<option value="{{ $u->id }}">{{ $u->name }}</option>
				@endforeach
			</select>
		@endif
	</div>

	<div class="h-64 overflow-y-auto bg-white dark:bg-gray-800 border rounded p-3 space-y-2">
		@foreach($messages as $m)
			<div class="flex {{ $m->from_user_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
				<div class="max-w-[75%] px-3 py-2 rounded {{ $m->from_user_id === auth()->id() ? 'bg-indigo-600 text-white' : 'bg-gray-200 dark:bg-gray-700 dark:text-white' }}">{{ $m->body }}</div>
			</div>
		@endforeach
	</div>

	<form wire:submit.prevent="send" class="flex gap-2">
		<input type="text" wire:model="message" class="flex-1 border rounded px-3 py-2" placeholder="Ketik pesan…">
		<button class="px-3 py-2 rounded bg-indigo-600 text-white">Kirim</button>
	</form>
</div>
