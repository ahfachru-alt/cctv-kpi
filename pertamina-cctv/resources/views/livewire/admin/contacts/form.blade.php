<div class="p-4">
	<form wire:submit.prevent="save" class="space-y-4">
		<div>
			<x-input-label for="name" :value="__('Name')" />
			<x-text-input id="name" class="block mt-1 w-full" type="text" wire:model="name" />
			@error('name')<div class="text-sm text-red-600 mt-1">{{ $message }}</div>@enderror
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
			<div>
				<x-input-label for="email" :value="__('Email')" />
				<x-text-input id="email" class="block mt-1 w-full" type="email" wire:model="email" />
			</div>
			<div>
				<x-input-label for="phone" :value="__('Phone')" />
				<x-text-input id="phone" class="block mt-1 w-full" type="text" wire:model="phone" />
			</div>
		</div>
		<div class="grid grid-cols-1 md:grid-cols-2 gap-3">
			<div>
				<x-input-label for="whatsapp" :value="__('WhatsApp')" />
				<x-text-input id="whatsapp" class="block mt-1 w-full" type="text" wire:model="whatsapp" />
			</div>
			<div>
				<x-input-label for="address" :value="__('Address')" />
				<x-text-input id="address" class="block mt-1 w-full" type="text" wire:model="address" />
			</div>
		</div>
		<div>
			<x-input-label for="message" :value="__('Message')" />
			<textarea id="message" wire:model="message" class="border rounded px-3 py-2 w-full" rows="4"></textarea>
		</div>
		<div class="flex items-center gap-2">
			<x-primary-button>{{ $contact ? 'Update' : 'Create' }}</x-primary-button>
			<a href="{{ route('admin.contacts.index') }}" class="px-3 py-2 border rounded">Cancel</a>
		</div>
	</form>
</div>
