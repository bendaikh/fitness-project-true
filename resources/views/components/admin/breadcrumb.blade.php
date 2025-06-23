@props([
    'title' => __('Title'),
    'list' => [],
])

<div class="section-header">
    <h1>{{ $title }}</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb mb-0">
            @foreach ($list as $key => $value)
                @if ($loop->last)
                    <div class="breadcrumb-item active" aria-current="page">{{ $key }}</div>
                @else
                    <div class="breadcrumb-item"><a href="{{ $value}}">{{ $key }}</a></div>
                @endif
            @endforeach
        </div>
    </div>
</div>