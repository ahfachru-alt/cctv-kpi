@extends('layouts.guest')

@section('content')
<div class="text-center mb-4">
	<img src="/Pertamina.png" class="mx-auto w-16 h-16" alt="Pertamina" />
	<h1 class="mt-2 font-semibold text-lg">Admin Reset Password</h1>
</div>

<livewire:admin.auth.reset-password />
@endsection

