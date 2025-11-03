@props([
    'label' => false,
    'type' => 'text',
    'id',
    'name',
    'value' => '',
])

@if($label)
    <label for="{{ $id }}">{{ $label }}</label>
@endif

<input
    type="{{ $type }}"
    id="{{ $id }}"
    name="{{ $name }}"
    value="{{ old($name, $value) }}"
    {{ $attributes->class([
        'form-control',
        'is-invalid' => $errors->has($name),
    ]) }}>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
