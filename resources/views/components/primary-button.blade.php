<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-custom-red border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-custom-red-700 focus:bg-custom-red-700 active:bg-custom-red-800 focus:outline-none focus:ring-2 focus:ring-custom-red-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
