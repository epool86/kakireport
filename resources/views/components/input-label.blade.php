@props(['value' => '', 'for' => ''])

<label {{ $attributes->merge(['for' => $for, 'class' => 'block font-medium text-sm text-custom-black-600']) }}>
    {{ $value ?? $slot }}
</label>
