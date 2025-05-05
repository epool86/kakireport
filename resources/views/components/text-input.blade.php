@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-custom-gray-300 focus:border-custom-red-500 focus:ring-custom-red-500 rounded-md shadow-sm']) }}>
