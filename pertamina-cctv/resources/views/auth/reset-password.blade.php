@extends('layouts.guest')

@section('content')
<div class="text-center p-6 text-sm text-gray-600">Redirecting to Reset Password...</div>
<meta http-equiv="refresh" content="0; url={{ url('reset-password/'.request()->route('token')) }}">
@endsection

