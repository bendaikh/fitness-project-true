@props([
    'type' => 'button',
    'text' => __('button'),
    'variant'=> 'primary',
    'id'=> null,
])
<button type="{{ $type }}"@if($id) id="{{$id}}"@endif {{ $attributes->merge(['class' => 'btn btn-'.$variant]) }}>{{ $text }}</button>