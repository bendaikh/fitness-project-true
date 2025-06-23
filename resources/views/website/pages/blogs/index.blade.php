@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Blog Page')->first()->seo_title ?? '' }}
@endsection

@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Blog Page')->first()->seo_description ?? '' }}">
@endsection


@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Blogs')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--============================
        BLOG START
    =============================--> --}}
    <section class="wsus__blog_grid mt_95 xs_mt_75 mb_120 xs_mb_100">
        <div class="container">
            <div class="row">
                @forelse ($blogs as $blog)
                    <div class="col-sm-6 col-lg-4 col-xl-4 wow fadeInUp">
                        <div class="wsus__blog_3_item">
                            <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                            <p><span><img src="{{ asset('website') }}/images/clock_2.png" alt="clock"
                                        class="img-fluid w-100"></span>
                                {{ $blog->created_at->format('d F, Y') }}
                            </p>
                            <div class="wsus__blog_3_overly">
                                <div class="text">
                                    <a href="{{ route('website.blog-details', $blog->slug) }}" class="title">
                                        {{ $blog->title }}
                                    </a>
                                    <a href="{{ route('website.blog-details', $blog->slug) }}"
                                        class="common_btn white_btn common_btn_2">{{ __('Read More') }}<i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    @include('components.no-data-found', ['message' => __('No Blogs Found')])
                @endforelse
            </div>
            @if ($blogs->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp vis-animation">
                        <div class="wsus__pagination mt_60">
                            {{ $blogs->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    {{-- <!--============================
        BLOG END
    =============================--> --}}
@endsection
