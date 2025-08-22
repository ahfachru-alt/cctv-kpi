<?php

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $email = '';

    /**
     * Send a password reset link to the provided email address.
     */
    public function sendPasswordResetLink(): void
    {
        $this->validate([
            'email' => ['required', 'string', 'email'],
        ]);

        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status != Password::RESET_LINK_SENT) {
            $this->addError('email', __($status));

            return;
        }

        $this->reset('email');

        session()->flash('status', __($status));
    }
}; ?>

<div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="sendPasswordResetLink">
        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>

    <div class="my-6 h-px bg-gray-200 dark:bg-gray-700"></div>

    <div class="mb-2 text-sm text-gray-600 dark:text-gray-400">
        Atau gunakan OTP untuk reset password:
    </div>
    <form method="POST" action="{{ route('password.otp.request') }}" class="space-y-3">
        @csrf
        <div>
            <x-input-label for="otp_email" :value="__('Email')" />
            <x-text-input id="otp_email" class="block mt-1 w-full" type="email" name="email" required />
        </div>
        <x-primary-button type="submit">Kirim Kode OTP</x-primary-button>
    </form>

    <form method="POST" action="{{ route('password.otp.verify') }}" class="space-y-3 mt-4">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <x-input-label for="verify_email" :value="__('Email')" />
                <x-text-input id="verify_email" class="block mt-1 w-full" type="email" name="email" required />
            </div>
            <div>
                <x-input-label for="code" :value="__('Kode OTP')" />
                <x-text-input id="code" class="block mt-1 w-full" type="text" name="code" required />
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
            <div>
                <x-input-label for="password" :value="__('Password Baru')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>
            <div>
                <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>
        </div>
        @if (session('success'))
            <div class="rounded border border-emerald-200 bg-emerald-50 text-emerald-800 px-4 py-2">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="rounded border border-red-200 bg-red-50 text-red-800 px-4 py-2">{{ session('error') }}</div>
        @endif
        <x-primary-button type="submit">Verifikasi OTP & Reset</x-primary-button>
    </form>
</div>
