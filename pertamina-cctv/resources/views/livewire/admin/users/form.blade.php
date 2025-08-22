<div class="p-4">
	<form wire:submit.prevent="save" class="space-y-4">
		<div>
			<x-input-label for="name" :value="__('Name')" />
			<x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
			@error('name')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div>
			<x-input-label for="email" :value="__('Email')" />
			<x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email" />
			@error('email')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		@if(! $user)
		<div>
			<x-input-label for="password" :value="__('Password')" />
			<x-text-input id="password" class="block mt-1 w-full" type="password" wire:model="password" />
			@error('password')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div>
			<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
			<x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" wire:model="password_confirmation" />
		</div>
		@endif
		<div class="flex items-center gap-2">
			<x-primary-button>{{ $user ? 'Update' : 'Create' }}</x-primary-button>
			<a href="{{ route('admin.users.index') }}" class="px-3 py-2 border rounded">Cancel</a>
		</div>
	</form>
</div>
