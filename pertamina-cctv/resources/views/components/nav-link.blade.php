@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center gap-2 px-2 pt-1 border-b-2 border-indigo-500 text-sm font-medium leading-5 text-gray-900 dark:text-gray-100 focus:outline-none transition duration-200'
            : 'inline-flex items-center gap-2 px-2 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 focus:outline-none transition duration-200';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
