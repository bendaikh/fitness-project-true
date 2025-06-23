@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Service Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Service Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    @include('components.website.breadcrum', ['title' => __('Service')])

    {{-- <!--============================
        PROGRAMS PAGE START
    =============================--> --}}
    <section class="wsus__programs_page mt_105 xs_mt_85 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 wow fadeInUp">
                    <div class="wsus__section_headeing heading_left mb_25">
                        <h2>{{ $pageUtility->service_title }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($services as $service)
                <div class="col-md-6 col-xl-4 wow fadeInUp">
                    <div class="wsus__program_item">
                        <img src="{{ asset($service->image) }}" alt="Program" class="img-fluid">
                        <div class="text">
                            <a href="{{ route('website.service.details', $service->slug) }}"
                                class="title">{{ $service->name }}</a>
                            <a href="{{ route('website.service.details', $service->slug) }}" class="arrow_button"><i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            @empty
                @include('components.no-data-found', ['message' => __('No service found!')])
            @endforelse
        </div>
        @if ($services->lastPage() > 1)
            <div class="row">
                <div class="col-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="wsus__pagination mt_120 xs_mt_100">
                        {{ $services->links('vendor.pagination.frontend') }}
                    </div>
                </div>
            </div>
        @endif
    </section>
@endsection
