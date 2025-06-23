@props(['href' => '','text' => __('Add New')])
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-primary']) }}><i class="fa fa-plus"></i> {{ $text }}</a>