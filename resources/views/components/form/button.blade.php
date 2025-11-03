@props([
    'type' => 'submit',
    'label',
    'color' => 'primary',
])

<button
    type="{{ $type }}"
    class="btn btn-{{ $color }}">
    {{ $label }}
</button>
