@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full outline-none p-3 rounded-md focus:border-indigo-500 focus:ring-indigo-500']) !!}>


