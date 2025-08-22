<div>
	<div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
		{{ __('Cek Gmail Anda untuk verifikasi. Jika belum menerima email, klik tombol di bawah untuk mengirim ulang.') }}
	</div>
	@if (session('status') == 'verification-link-sent')
		<div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
			{{ __('A new verification link has been sent to the email address you provided during registration.') }}
		</div>
	@endif
	<form method="POST" action="{{ route('verification.send') }}">
		@csrf
		<x-primary-button>{{ __('Resend Verification Email') }}</x-primary-button>
	</form>
</div>
