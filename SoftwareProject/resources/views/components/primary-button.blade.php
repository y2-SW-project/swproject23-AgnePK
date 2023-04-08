<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'bg-primary inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded font-semibold text-black text-dark uppercase']) }}>
    {{ $slot }}
</button>
