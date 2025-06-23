@props([
    'id' => '',
    'name' => '',
    'label' => null,
    'required' => false,
])
@if ($label)
    <label for="{{ $id }}">{{ $label }} @if($required)<span class="text-danger">*</span>@endif</label>
@endif
<select name="{{ $name }}" id="{{ $id }}" {{ $attributes->merge(['class' => 'form-control']) }}>
    {{ $slot }}
</select>
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror
