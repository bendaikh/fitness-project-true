@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Contact Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Contact Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Contact')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}

    {{-- <!--============================
        CONTACT START
    =============================--> --}}
    <section class="wsus__contact mt_120 xs_mt_100">
        <div class="row">
            <div class="col-xxl-8">
                <div class="wsus__contact_contant">
                    <div class="wsus__section_headeing heading_left mb_25 wow fadeInUp">
                        <h2>{{ $contact_page?->title }}</h2>
                    </div>
                    <form action="{{ route('send-contact-message') }}" id="contact-form"
                        class="wsus__contact_form wow fadeInUp">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6">
                                <div class="wsus__contact_form_input">
                                    <input type="text" placeholder="{{ __('Name') }}*" name="name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="wsus__contact_form_input">
                                    <input type="email" placeholder="{{ __('Email') }} *" name="email">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="wsus__contact_form_input">
                                    <input type="text" placeholder="{{ __('Phone Number') }}" name="phone">
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-6">
                                <div class="wsus__contact_form_input">
                                    <input type="text" placeholder="{{ __('Subject') }} *" name="subject">
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__contact_form_input">
                                    <textarea rows="4" placeholder="{{ __('Message') }} *" name="message"></textarea>
                                </div>
                            </div>
                            @if ($setting->recaptcha_status == 'active')
                                <div class="col-xl-12">
                                    <div class="wsus__contact_form_input mt_15">
                                        <div class="g-recaptcha" data-sitekey="{{ $setting->recaptcha_site_key }}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-xl-12">
                                <div class="wsus__contact_form_button">
                                    <button type="submit" class="common_btn common_btn_2">{{ __('Send') }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="wsus__contact_address">
                        <div class="row">
                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="wsus__contact_item">
                                    <span><img src="{{ asset('website') }}/images/location_icon_3.png" alt="location"
                                            class="img-fluid w-100"></span>
                                    <h6>{{ __('Address') }}</h6>
                                    <p>{{ $contact_page?->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="wsus__contact_item">
                                    <span><img src="{{ asset('website') }}/images/mail_icon_2.png" alt="email"
                                            class="img-fluid w-100"></span>
                                    <h6>{{ __('Email') }}</h6>
                                    @php
                                        $email = preg_split('/[ ,;\n]+/', $contact_page?->email);
                                    @endphp
                                    <a>
                                        @foreach ($email as $item)
                                            {{ $item }} <br>
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4 wow fadeInUp">
                                <div class="wsus__contact_item">
                                    <span><img src="{{ asset('website') }}/images/call_icon_2.png" alt="location"
                                            class="img-fluid w-100"></span>
                                    <h6>{{ __('Phone') }}</h6>
                                    @php
                                        $phone = preg_split('/[ ,;\n]+/', $contact_page?->phone);
                                    @endphp
                                    <a>
                                        @foreach ($phone as $item)
                                            {{ $item }} <br>
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 wow fadeInUp">
                <div class="wsus__contact_img">
                    <img src="{{ asset($contact_page?->image ?? 'uploads/website-images/contact_img.jpg') }}"
                        alt="contact" class="img-fluid w-100">
                </div>
            </div>
        </div>
    </section>

    @if ($contact_page?->map)
        <section class="wsus__contact_map_area mt_115 xs_mt_95">
            <div class="row">
                <div class="col-xl-12 wow fadeInUp">
                    <div class="wsus__contact_map">
                        <iframe src="{{ asset($contact_page?->map) }}" width="600" height="450" class="border-0"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </section>
    @endif
    {{-- <!--============================
        CONTACT END
    =============================--> --}}
@endsection


@push('scripts')
    <script>
        'use strict';
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();
                var isDemo = "{{ env('APP_MODE') ?? LIVE }}"
                if (isDemo == 'DEMO') {
                    toastr.error("{{ __('In Demo Mode you can not perform this action') }}");
                    return;
                }
                if ($("#g-recaptcha-response").val() === '') {
                    e.preventDefault();
                    @if ($setting->recaptcha_status == 'active')
                        toastr.error("Please complete the recaptcha to submit the form")
                        return;
                    @endif
                }
                var form = $(this);
                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: form.serialize(),
                    beforeSend: function() {
                        // loader
                        $("#contact-form button[type='submit']").html(
                            '<i class="fas fa-spinner fa-spin"></i> &nbsp; {{ __('Sending') }}...'
                        )
                        form.find('button[type="submit"]').prop('disabled', true);

                    },
                    success: function(response) {
                        if (response.status == 'success') {
                            form[0].reset();
                            toastr.success(response.message);
                            form.find('button[type="submit"]').prop('disabled', false);
                            $("#contact-form button[type='submit']").html(
                                '{{ __('Send') }}'
                            )
                        } else {
                            toastr.error(response.message);
                            form.find('button[type="submit"]').prop('disabled', false);
                            $("#contact-form button[type='submit']").html(
                                '{{ __('Send') }}'
                            )
                        }
                    },
                    error: function(response) {
                        if (response.responseJSON.errors) {
                            $.each(response.responseJSON.errors, function(key, value) {
                                toastr.error(value);
                            });
                        }
                        form.find('button[type="submit"]').prop('disabled', false);
                        $("#contact-form button[type='submit']").html(
                            '{{ __('Send') }}'
                        )
                    }
                });
            });
        });
    </script>
@endpush
