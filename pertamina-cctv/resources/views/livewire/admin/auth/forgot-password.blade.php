<div>
	<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
		{{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link.') }}
	</div>
	<x-auth-session-status class="mb-4" :status="session('status')" />
	<form method="POST" action="{{ route('password.email') }}">
		@csrf
		<div>
			<x-input-label for="email" :value="__('Email')" />
			<x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
		</div>
		<div class="flex items-center justify-end mt-4">
			<x-primary-button>{{ __('Email Password Reset Link') }}</x-primary-button>
		</div>
	</form>
</div>
