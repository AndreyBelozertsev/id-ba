<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-6 px-10 rounded-md bg-p2_sec-2 text-lg md:text-2xl text-white font-nunito-700']) }}>
    {{ $slot }}
</button>
