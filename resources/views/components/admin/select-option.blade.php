@props([
    'text' => '',
    'selected' => false,
])
<option {{ $selected ? 'selected' : '' }} {{ $attributes->merge(['class'=> '']) }}>{{ $text }}</option>
