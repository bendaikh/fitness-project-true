@extends('website.layout.master')



@section('title')
    {{ seoSetting()->where('page_name', 'FAQ Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'FAQ Page')->first()->seo_description ?? '' }}">
@endsection


@section('content')
    @include('components.website.breadcrum', ['title' => __('Faqs')])

    {{-- <!--============================
        FAQ'S START
    =============================--> --}}
    <section class="wsus__faq mt_110 xs_mt_90 mb_120 xs_mb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-xl-10">
                    <div class="wsus__faq_accordion_area">
                        <div class="wsus__section_heading_3 mb_55 wow fadeInUp">
                            <h2>{{ $pageUtility->faq_title }}</h2>
                        </div>
                        <div class="wsus__faq_accordion accordion accordion-flush" id="accordionFlushExample">
                            @forelse ($faqs as $faq)
                                <div class="accordion-item wow fadeInUp">
                                    <h2 class="accordion-header" id="flush-heading{{ $faq->id }}">
                                        <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}"
                                            type="button" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapse{{ $faq->id }}" aria-expanded="false"
                                            aria-controls="flush-collapse{{ $faq->id }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="flush-collapse{{ $faq->id }}"
                                        class="accordion-collapse collapse{{ $loop->first ? ' show' : '' }}"
                                        aria-labelledby="flush-heading{{ $faq->id }}"
                                        data-bs-parent="#accordionFlushExample" style="">
                                        <div class="accordion-body">{{ $faq->answer }}</div>
                                    </div>
                                </div>
                            @empty
                                @include('components.no-data-found', ['message' => __('No FAQ found')])
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!--============================
        FAQ'S END
    =============================--> --}}
@endsection
