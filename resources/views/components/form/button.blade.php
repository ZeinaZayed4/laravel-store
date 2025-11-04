@props([
    'type' => 'submit',
    'color' => 'primary',
])

<button
    type="{{ $type }}"
    {{ $attributes->class([
        "btn btn-$color",
    ]) }}>
    {{ $slot }}
</button>
