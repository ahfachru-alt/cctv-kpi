@props(['title' => 'Title', 'value' => '0', 'color' => 'bg-indigo-600'])
<div class="p-4 rounded shadow bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700">
	<div class="text-sm text-gray-500 mb-2">{{ $title }}</div>
	<div class="flex items-end justify-between">
		<div class="text-3xl font-bold">{{ $value }}</div>
		<span class="inline-block w-3 h-3 rounded-full {{ $color }}"></span>
	</div>
</div>