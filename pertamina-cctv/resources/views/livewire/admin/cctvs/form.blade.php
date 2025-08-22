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
			<x-input-label for="room" :value="__('Room')" />
			<select id="room" wire:model="room_id" class="border rounded px-3 py-2 w-full">
				<option value="">Pilih ruangan...</option>
				@foreach($roomsOptions as $r)
					<option value="{{ $r->id }}">{{ $r->name }}</option>
				@endforeach
			</select>
			@error('room_id')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div>
			<x-input-label for="name" :value="__('CCTV Name')" />
			<x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
			@error('name')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
			<div>
				<x-input-label for="ip" :value="__('IP Address')" />
				<x-text-input id="ip" class="block mt-1 w-full" type="text" wire:model="ip_address" />
				@error('ip_address')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
			</div>
			<div>
				<x-input-label for="status" :value="__('Status')" />
				<select id="status" wire:model="status" class="border rounded px-3 py-2 w-full">
					<option value="online">Online</option>
					<option value="offline">Offline</option>
					<option value="maintenance">Maintenance</option>
				</select>
			</div>
		</div>
		<div>
			<x-input-label for="rtsp" :value="__('RTSP URL')" />
			<x-text-input id="rtsp" class="block mt-1 w-full" type="text" wire:model="rtsp_url" />
			@error('rtsp_url')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div class="flex items-center gap-2">
			<x-primary-button>{{ $cctv ? 'Update' : 'Create' }}</x-primary-button>
			<a href="{{ route('admin.cctvs.index') }}" class="px-3 py-2 border rounded">Cancel</a>
		</div>
	</form>
</div>
