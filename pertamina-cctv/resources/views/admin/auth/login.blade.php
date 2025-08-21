@extends('layouts.guest')

@section('content')
<div class="text-center mb-4">
	<img src="/Pertamina.png" class="mx-auto w-16 h-16" alt="Pertamina" />
	<h1 class="mt-2 font-semibold text-lg">Admin Login</h1>
</div>

<div class="text-sm text-gray-600 dark:text-gray-300 mb-4">Masuk sebagai admin untuk mengelola platform.</div>

<form method="POST" action="{{ route('login') }}">
	@csrf
	<div>
		<x-input-label for="email" :value="__('Email')" />
		<x-text-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus />
	</div>
	<div class="mt-4">
		<x-input-label for="password" :value="__('Password')" />
		<x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
	</div>
	<div class="mt-6 flex items-center justify-between">
		<a href="{{ route('password.request') }}" class="underline text-sm">Lupa password?</a>
		<x-primary-button>Login</x-primary-button>
	</div>
</form>
@endsection
<div>
    <!-- Always remember that you are absolutely unique. Just like everyone else. - Margaret Mead -->
</div>
