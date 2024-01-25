@props([
    'value',
    'required' => false
])

<label {{ $attributes->merge(['class' => 'block text-btn-sec-21 font-nunito-700 text-base md:text-lg mb-2']) }}>
    {{ $value ?? $slot }} @if($required) <span class="text-red-500">*</span> @endif
</label>
