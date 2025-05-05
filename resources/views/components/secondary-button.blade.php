<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-custom-black-300 rounded-md font-semibold text-xs text-custom-black-700 uppercase tracking-widest shadow-sm hover:bg-custom-gray-100 focus:outline-none focus:ring-2 focus:ring-custom-red-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
