@props([
    'disabled' => false,
])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'outline-none p-3 rounded-md w-full resize-none']) !!}>{{ $slot }}</textarea>