@extends('layouts.admin')

@section('content')
<div class="p-6">
	<h1 class="text-2xl font-semibold mb-4">Signal Analytics</h1>
	<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
		<x-stat title="User Online" color="bg-green-600" value="0" />
		<x-stat title="User Offline" color="bg-red-600" value="0" />
		<x-stat title="CCTV Online" color="bg-green-600" value="0" />
		<x-stat title="CCTV Offline" color="bg-red-600" value="0" />
	</div>
	<div class="mt-6">
		<a href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded bg-emerald-600 text-white">Download Excel</a>
	</div>
</div>
@endsection
<div>
    <!-- Smile, breathe, and go slowly. - Thich Nhat Hanh -->
</div>
