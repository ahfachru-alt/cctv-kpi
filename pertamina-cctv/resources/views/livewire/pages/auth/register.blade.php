<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Spatie\Permission\Models\Role;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));
        try { $user->assignRole('user'); } catch (\Throwable $e) {}

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}; ?>

<div>
    <form wire:submit="register">
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input wire:model="password" id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-between mt-6">
            <form method="POST" action="{{ route('google.token') }}" id="google-register-form" class="hidden">
                @csrf
                <input type="hidden" name="credential" id="google-register-credential" />
            </form>
            <button type="button" id="google-register-btn" class="inline-flex items-center gap-2 rounded-md bg-red-600 text-white px-3 py-2 hover:bg-red-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" class="w-5 h-5"><path fill="#EA4335" d="M24 9.5c3.51 0 6.67 1.21 9.16 3.6l6.86-6.86C35.74 2.08 30.29 0 24 0 14.65 0 6.51 5.38 2.56 13.2l7.96 6.18C12.39 13.03 17.74 9.5 24 9.5z"/><path fill="#4285F4" d="M46.5 24c0-1.64-.15-3.2-.44-4.7H24v9.02h12.65c-.55 2.98-2.2 5.51-4.67 7.21l7.12 5.52C43.89 36.64 46.5 30.8 46.5 24z"/><path fill="#FBBC05" d="M10.52 19.38l-7.96-6.18C.9 16.14 0 19.96 0 24c0 3.99.88 7.77 2.49 11.1l8.03-6.22C9.6 27 9.2 25.54 9.2 24c0-1.91.48-3.7 1.32-5.28z"/><path fill="#34A853" d="M24 48c6.48 0 11.92-2.13 15.89-5.81l-7.12-5.52c-2 1.35-4.56 2.16-8.77 2.16-6.27 0-11.6-3.49-13.54-8.43l-8.03 6.22C6.38 42.66 14.68 48 24 48z"/></svg>
                <span>Daftar dengan Gmail</span>
            </button>

            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}" wire:navigate>
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script>
        window.addEventListener('load', () => {
            const clientId = '{{ env('GOOGLE_CLIENT_ID') }}';
            const btn = document.getElementById('google-register-btn');
            btn?.addEventListener('click', () => {
                google.accounts.id.initialize({ client_id: clientId, callback: (resp) => {
                    document.getElementById('google-register-credential').value = resp.credential;
                    document.getElementById('google-register-form').submit();
                }});
                google.accounts.id.prompt();
            });
        });
    </script>
</div>
