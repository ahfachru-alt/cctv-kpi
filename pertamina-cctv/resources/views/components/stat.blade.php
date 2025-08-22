@props(['title' => 'Title', 'value' => '0', 'color' => 'bg-indigo-600'])
<div class="rounded-lg overflow-hidden bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
	<div class="w-full h-1 {{ $color ?? 'bg-indigo-600' }}"></div>
	<div class="p-4">
		<div class="text-sm text-gray-600 dark:text-gray-400">{{ $title ?? 'Stat' }}</div>
		<div class="text-2xl font-semibold mt-1">{{ $value ?? '-' }}</div>
	</div>
</div>