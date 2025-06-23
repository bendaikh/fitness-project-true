@props(['href' => url()->previous(),'text' => __('Back')])
<a href="{{ $href }}" {{ $attributes->merge(['class' => 'btn btn-primary']) }}><i class="fa fa-arrow-left"></i> {{ $text }}</a>