@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Privacy & Policy Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description"
        content="{{ seoSetting()->where('page_name', 'Privacy & Policy Page')->first()->seo_description ?? '' }}">
@endsection


@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Privacy policy')])
    {{-- <!--============================
            BREADCRUMBS END
        =============================--> --}}


    {{-- <!--=============================
            PRIVACY POLICY START
        ==============================--> --}}
    <section class="wsus__privacy_policy pt_75 xs_pt_55 pb_95 xs_pb_75">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp">
                    <div class="wsus__privacy_policy_text">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!--=============================
            PRIVACY POLICY END
        ==============================--> --}}
@endsection
