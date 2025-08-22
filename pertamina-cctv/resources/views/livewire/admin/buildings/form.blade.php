<div class="p-4">
	<form wire:submit.prevent="save" class="space-y-4">
		<div>
			<x-input-label for="name" :value="__('Name')" />
			<x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
			@error('name')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
			<div>
				<x-input-label for="latitude" :value="__('Latitude')" />
				<x-text-input id="latitude" class="block mt-1 w-full" type="number" step="0.0000001" wire:model="latitude" />
			</div>
			<div>
				<x-input-label for="longitude" :value="__('Longitude')" />
				<x-text-input id="longitude" class="block mt-1 w-full" type="number" step="0.0000001" wire:model="longitude" />
			</div>
		</div>
		<div>
			<x-input-label for="address" :value="__('Address')" />
			<x-text-input id="address" class="block mt-1 w-full" type="text" wire:model="address" />
		</div>
		<div class="flex items-center gap-2">
			<x-primary-button>{{ $building ? 'Update' : 'Create' }}</x-primary-button>
			<a href="{{ route('admin.buildings.index') }}" class="px-3 py-2 border rounded">Cancel</a>
		</div>
	</form>
</div>
