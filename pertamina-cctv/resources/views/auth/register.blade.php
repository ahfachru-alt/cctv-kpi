@extends('layouts.guest')

@section('content')
<div class="text-center p-6 text-sm text-gray-600">Redirecting to Register...</div>
<meta http-equiv="refresh" content="0; url={{ route('register') }}">
@endsection

