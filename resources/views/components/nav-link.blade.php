@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-3 pt-1 border-b-2 border-blue-600 text-sm font-semibold leading-5 text-blue-600 bg-blue-50 rounded-t-md transition duration-150 ease-in-out'
            : 'inline-flex items-center px-3 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-600 hover:text-blue-600 hover:border-blue-300 focus:outline-none focus:text-blue-600 focus:border-blue-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
