@props([
    'id' => '',
    'name' => '',
    'label' => '',
    'value' => '',
    'required' => false,
])
<label for="{{ $id }}">{{ $label }} @if($required)<span class="text-danger">*</span>@endif</label>
<textarea name="{{ $name }}" id="{{ $id }}" cols="30" rows="10" {{ $attributes->merge(['class' => 'summernote']) }}>{{ $value }}</textarea>
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror