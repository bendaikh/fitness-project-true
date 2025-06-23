@extends('website.layout.master')

@section('title')
    {{ seoSetting()->where('page_name', 'Terms & Condition Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description"
        content="{{ seoSetting()->where('page_name', 'Terms & Condition Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Terms & Conditions')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}


    {{-- <!--=============================
        TERMS CONDITION START
    ==============================--> --}}
    <section class="wsus__terms_condition pt_75 xs_pt_55 pb_95 xs_pb_75">
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
        TERMS CONDITION END
    ==============================--> --}}
@endsection
