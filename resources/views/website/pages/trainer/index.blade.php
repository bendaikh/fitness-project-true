@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Trainer Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Trainer Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    @include('components.website.breadcrum', ['title' => __('Our Trainer')])

    <!--============================
                TRAINER PAGE START
            =============================-->
    <section class="wsus__trainer_page mt_95 xs_mt_75 mb_120 xs_mb_100">
        <div class="row">
            @forelse($trainers as $trainer)
                <div class="col-md-6 col-lg-4 col-xl-3 wow fadeInUp">
                    @include('components.trainer', ['trainer' => $trainer])
                </div>
            @empty
                @include('components.no-data-found', ['message' => __('No Trainer Found')])
            @endforelse
        </div>
        @if ($trainers->lastPage() > 1)
            <div class="row">
                <div class="col-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="wsus__pagination mt_60">
                        {{ $trainers->links('vendor.pagination.frontend') }}
                    </div>
                </div>
            </div>
        @endif
    </section>
    {{-- <!--============================
        TRAINER PAGE END
    =============================--> --}}
@endsection
