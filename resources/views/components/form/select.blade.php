@props([
    'label' => false,
    'id',
    'name',
    'value' => '',
    'options' => [],
    'placeholder' => false,
])

@if($label)
    <label for="{{ $id }}" class="form-label">{{ $label }}</label>
@endif

<select
    id="{{ $id }}"
    name="{{ $name }}"
    {{ $attributes->class([
        'form-control',
        'form-select',
        'is-invalid' => $errors->has($name),
    ]) }}>

    @if($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @foreach($options as $key => $text)
        <option value="{{ $key }}" @selected(old($name, $value) == $key)>
            {{ $text }}
        </option>
    @endforeach
</select>

@error($name)
    <div class="invalid-feedback">
        {{ $message }}
    </div>
@enderror
