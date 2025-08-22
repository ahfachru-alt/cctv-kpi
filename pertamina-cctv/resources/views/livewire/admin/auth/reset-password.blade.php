<div>
	<form method="POST" action="{{ route('password.store') }}">
		@csrf
		<input type="hidden" name="token" value="{{ request()->route('token') }}" />
		<div>
			<x-input-label for="email" :value="__('Email')" />
			<x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
		</div>
		<div class="mt-4">
			<x-input-label for="password" :value="__('Password')" />
			<x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
		</div>
		<div class="mt-4">
			<x-input-label for="password_confirmation" :value="__('Confirm Password')" />
			<x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
		</div>
		<div class="flex items-center justify-end mt-4">
			<x-primary-button>{{ __('Reset Password') }}</x-primary-button>
		</div>
	</form>
</div>
