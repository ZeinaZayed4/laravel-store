@props([
    'label' => false,
    'name',
    'options' => [],
    'selected' => false,
])

@if($label)
    <label class="form-label">{{ $label }}</label>
@endif

<div>
    @foreach($options as $value => $text)
        <div class="form-check">
            <input
                class="form-check-input @error($name) is-invalid @enderror"
                type="radio"
                name="{{ $name }}"
                id="{{ $name.'_'.$value }}"
                value="{{ $value }}"
                @checked(old($name, $selected) === $value)>
            <label class="form-check-label" for="{{ $name.'_'.$value }}">
                {{ $text }}
            </label>
        </div>
    @endforeach

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
