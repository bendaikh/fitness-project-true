@extends('website.layout.master')



@section('title')
    {{ html_decode($service->name) }} || {{ seoSetting()->where('page_name', 'Service Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Service Page')->first()->seo_description ?? '' }}">
@endsection


@section('content')
    @include('components.website.breadcrum', ['title' => __('Service Details')])

    {{-- <!--============================
        PROGRAM DETAILS START
    =============================--> --}}
    <section class="wsus__blog_details wsus__program_details mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 wow fadeInUp">
                    <div class="wsus__blog_details_left wsus__program_details_left wsus__product_description mt-0">
                        <div class="wsus__program_details_img_1 wow fadeInUp">
                            <img src="{{ asset($service->image) }}" alt="program" class="img-fluid w-100">
                        </div>

                        <h2 class="mt_20 wow fadeInUp">{{ $service->name }}</h2>
                        {!! clean(nl2br($service->description)) !!}

                        <div class="row mt_45 program_details_slider">
                            @foreach ($service->videos as $video)
                                <div class="col-md-6 col-xl-6 wow fadeInUp">
                                    @include('components.website.video-gallery', ['video' => $video])
                                </div>
                            @endforeach
                        </div>
                        @php
                            $tags = json_decode($service->tags) ?? [];
                        @endphp

                        <div class="wsus__program_tags_shear wow fadeInUp">
                            <div class="wsus__program_tags">
                                <h6>{{ __('Tags') }}</h6>
                                <ul>
                                    @foreach ($tags as $tag)
                                        <li><a
                                                href="{{ route('website.service') }}?tag={{ $tag->value }}">{{ $tag->value }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="wsus__program_shear">
                                <h6>{{ __('Share') }}</h6>
                                <ul>
                                    <li><a href="{{ $shareLinks->facebook }}"><i class="fab fa-facebook-f"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $shareLinks->twitter }}"><i class="fab fa-twitter"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $shareLinks->linkedin }}"><i class="fab fa-linkedin-in"
                                                aria-hidden="true"></i></a></li>
                                    <li><a href="{{ $shareLinks->pinterest }}"><i class="fab fa-pinterest"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        @if ($service->image_url)
                            <h2 class="mt_45 wow fadeInUp">{{ __('Photo Gallery') }}</h2>
                        @endif
                        <div class="wsus__program_photo_gallery">
                            <div class="row program_photo_slider">
                                @foreach ($service->image_url as $url)
                                    <div class="col-sm-6 col-lg-4 col-xl-4 wow fadeInUp">
                                        @include('components.website.photo-gallery', ['url' => $url])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="wsus__faq_accordion accordion accordion-flush" id="accordionFlushExample">
                        @foreach ($service->faqs as $faq)
                            <div class="accordion-item wow fadeInUp">
                                <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $faq['id'] }}"
                                        aria-expanded="false" aria-controls="flush-collapse{{ $faq['id'] }}">
                                        {{ $faq['question'] }}
                                    </button>
                                </h2>
                                <div id="flush-collapse{{ $faq['id'] }}"
                                    class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample"
                                    style="">
                                    <div class="accordion-body">
                                        {{ $faq['answer'] }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp">
                    <div class="sticky_sidebar">
                        <div class="wsus__blog_details_right wsus__program_details_right">
                            <div class="wsus__blog_sidebar_wizard mt-0 wow fadeInUp">
                                <h4>{{ __('Other Services') }}</h4>
                                <ul class="wsus__blog_sidebar_releted_blog">
                                    @foreach ($services as $ser)
                                        <li>
                                            <a href="{{ route('website.service.details', $ser->slug) }}">
                                                <span>
                                                    <img src="{{ asset($ser->image) }}" alt="blog"
                                                        class="img-fluid w-100"></span>
                                                <b class="title">{{ $ser->name }}</b>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="wsus__blog_sidebar_wizard wow fadeInUp">
                                <h4>{{ __('Contact Info') }}</h4>
                                <form action="#" class="wsus__program_details_sidebar_form" method="post">
                                    @csrf
                                    <input type="hidden" name="service_id" value="{{ $service->id }}">
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="input">
                                                <input type="text" placeholder="{{ __('Name') }}*" name="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input">
                                                <input type="email" placeholder="{{ __('Email') }}" name="email">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input">
                                                <input type="text" placeholder="{{ __('Phone Number') }}*"
                                                    name="phone">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input">
                                                <textarea rows="4" placeholder="Write a Description*" name="message"></textarea>
                                            </div>
                                        </div>
                                        @if ($setting->recaptcha_status == 'active')
                                            <div class="col-xl-12">
                                                <div class="wsus__contact_form_input mb-3">
                                                    <div class="g-recaptcha"
                                                        data-sitekey="{{ $setting->recaptcha_site_key }}">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="col-xl-12 mt-2">
                                            <div class="input_btn mt-0">
                                                <button type="submit" class="common_btn">{{ __('Send Message') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            @if ($service->file)
                                <div class="wsus__program_pdf_download_btn mt_30">
                                    <a href="{{ asset($service->file) }}" class="common_btn w-100"
                                        download="{{ $service->name }}">{{ __('Download PDF') }}<i
                                            class="fal fa-download"></i></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!--============================
        PROGRAM DETAILS END
    =============================--> --}}
@endsection


@push('scripts')
    <script>
        'use strict'
        $(document).ready(function() {
            $('.program_details_slider').siblings('p').addClass('wow fadeInUp')

            $('.wsus__program_details_sidebar_form').on('submit', function(e) {
                e.preventDefault();
                if ($("#g-recaptcha-response").val() === '') {
                    e.preventDefault();
                    @if ($setting->recaptcha_status == 'active')
                        toastr.error("Please complete the recaptcha to submit the form")
                        return;
                    @endif
                }
                const button = $(this).find('button[type="submit"]');
                button.html('<i class="fas fa-spinner fa-spin"></i>')
                $.ajax({
                    type: 'post',
                    url: "{{ route('website.workout.contact') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response.status == 200) {
                            toastr.success(response.message)
                        } else {
                            toastr.error(response.message)
                        }
                        button.html('{{ __('Submitted') }}')

                        // reset form
                        $(".wsus__program_details_sidebar_form").trigger("reset");
                    },
                    error: function(response) {
                        console.log(response);
                        if (response.responseJSON.errors) {
                            $.each(response.responseJSON.errors, function(key, value) {
                                toastr.error(value)
                            })
                        }
                    },
                    complete: function() {
                        button.html('{{ __('Send Message') }}')
                    }
                })
            })
        });
    </script>
@endpush
