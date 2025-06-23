@props([
    'div_id' => 'image-preview',
    'label_id' => 'image-label',
    'input_id' => 'image-upload',
    'name' => 'image',
    'label' => __('Thumbnail Image'),
    'button_label' => __('Upload Image'),
    'required' => true,
    'image' => null,
])

<label>{{ $label }} @if($required)<span class="text-danger">*</span>@endif</label>
<div id="{{ $div_id }}" {{ $attributes->merge(['class' => 'image-preview']) }}
    @if ($image) style="background-image: url({{ asset($image) }});" @endif>
    <label for="{{ $input_id }}" id="{{ $label_id }}">{{ $button_label }}</label>
    <input type="file" name="{{ $name }}" id="{{ $input_id }}">
</div>
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror