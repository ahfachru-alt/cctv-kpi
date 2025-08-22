<div class="p-4">
	<form wire:submit.prevent="save" class="space-y-4">
		<div>
			<x-input-label for="building" :value="__('Building')" />
			<select id="building" wire:model="building_id" class="border rounded px-3 py-2 w-full">
				<option value="">Pilih gedung...</option>
				@foreach($buildings as $b)
					<option value="{{ $b->id }}">{{ $b->name }}</option>
				@endforeach
			</select>
			@error('building_id')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div>
			<x-input-label for="name" :value="__('Room Name')" />
			<x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
			@error('name')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div>
			<x-input-label for="floor" :value="__('Floor')" />
			<x-text-input id="floor" class="block mt-1 w-full" type="number" wire:model="floor" />
			@error('floor')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div class="flex items-center gap-2">
			<x-primary-button>{{ $room ? 'Update' : 'Create' }}</x-primary-button>
			<a href="{{ route('admin.rooms.index') }}" class="px-3 py-2 border rounded">Cancel</a>
		</div>
	</form>
</div>
