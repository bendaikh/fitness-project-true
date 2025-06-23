@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'placeholder' => '',
    'maxlength' => null,
    'value' => '',
])
<label for="{{ $id }}">{{ $label }}</label>
<textarea @if($maxlength) maxlength="{{ $maxlength }}" @endif {{ $attributes->merge(['class' => 'form-control text-area-5']) }} name="{{ $name }}" id="{{ $id }}" placeholder="{{ $placeholder }}">{{ $value }}</textarea>
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror