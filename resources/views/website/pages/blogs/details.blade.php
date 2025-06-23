@extends('website.layout.master')

@section('title')
    {{ html_decode($blog->title) }} || {{ seoSetting()->where('page_name', 'Blog Page')->first()->seo_title ?? '' }}
@endsection

@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Blog Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')

    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Blog Details')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}

    {{-- <!--============================
        BLOG DETAILS START
    =============================--> --}}
    <section class="wsus__blog_details mt_120 xs_mt_100 mb_120 xs_mb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 wow fadeInUp">
                    <div class="wsus__blog_details_left">
                        <div class="wsus__blog_details_img_1 wow fadeInUp">
                            <img src="{{ asset($blog->image) }}" alt="blog" class="img-fluid w-100">
                        </div>
                        <ul class="wsus__blog_details_img_info wow fadeInUp">
                            <li>
                                <span><img src="{{ avatar($blog->admin?->image) }}" alt="blog"
                                        class="img-fluid w-100"></span>
                                {{ __('By') }} {{ $blog->admin?->name }}
                            </li>
                            <li>
                                <span><img src="{{ asset('website') }}/images/calender_icon.png" alt="blog"
                                        class="img-fluid w-100"></span>
                                {{ $blog->created_at->format('F d, Y') }}
                            </li>
                            <li>
                                <span><img src="{{ asset('website') }}/images/comment_icon.png" alt="blog"
                                        class="img-fluid w-100"></span>
                                {{ $comments->count() }}
                            </li>
                            <li>
                                <span><img src="{{ asset('website') }}/images/health_icon.png" alt="blog"
                                        class="img-fluid w-100"></span>
                                {{ $blog->category?->title }}
                            </li>
                        </ul>
                        <h2 class="mt_20 wow fadeInUp">{{ $blog->title }}</h2>
                        <div class="wsus__blog_det_text">
                            {!! clean(nl2br($blog->description)) !!}
                        </div>

                        <div class="wsus__blog_details_tag_share wow fadeInUp">
                            <div class="tags">
                                @php
                                    $tags = $blog->tags != null ? json_decode($blog->tags) : [];
                                @endphp
                                <h6>{{ __('Post Tags') }}:</h6>
                                <ul class="wsus__blog_details_tag">
                                    @foreach ($tags as $tag)
                                        <li>
                                            <a
                                                href="{{ route('website.blogs') }}?tag={{ $tag->value }}">{{ $tag->value }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <ul class="wsus__blog_sidebar_icon d-flex flex-wrap">
                                <li><a href="{{ $shareLinks->facebook }}"><i class="fab fa-facebook-f"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="{{ $shareLinks->twitter }}"><i class="fab fa-twitter"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="{{ $shareLinks->linkedin }}"><i class="fab fa-linkedin-in"
                                            aria-hidden="true"></i></a></li>
                                <li><a href="{{ $shareLinks->pinterest }}"><i class="fab fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                        <div class="wsus__blog_post_direction">
                            @if ($previous_record != null)
                                <div class="prev_post wow fadeInUp">
                                    <a href="{{ route('website.blog-details', $previous_record->slug) }}" class="icon"><i
                                            class="fal fa-angle-left"></i></a>
                                    <div class="text">
                                        <h6>{{ __('Prev Post') }}</h6>
                                        <a href="javascript:;" class="title">{{ $previous_record->title }}</a>
                                    </div>
                                </div>
                            @endif
                            @if ($after_record != null)
                                <div class="next_post wow fadeInUp">
                                    <a href="{{ route('website.blog-details', $after_record->slug) }}" class="icon"><i
                                            class="fal fa-angle-right"></i></a>
                                    <div class="text">
                                        <h6>{{ __('Next Post') }}</h6>
                                        <a href="javascript:;" class="title">{{ $after_record->title }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="wsus__blog_comments wow fadeInUp">
                            <h4>{{ __('Comments') }} ({{ $comments->count() }})</h4>
                            @if ($comments->count() > 0)
                                @foreach ($comments as $index => $comment)
                                    <div class="wsus__blog_single_comment wow fadeInUp">
                                        <div class="img">
                                            <img src="{{ asset($setting->default_avatar) }}" alt="comment"
                                                class="img-fluid w-100">
                                        </div>
                                        <div class="text">
                                            <h5>{{ $comment->name }}</h5>
                                            <span class="date">
                                                {{ $comment->created_at->format('M d, Y') }} {{ __('at') }}
                                                {{ $comment->created_at->format('i:h') }}
                                            </span>
                                            <p>
                                                {{ $comment->comment }}
                                            </p>
                                            <a href="#blogCommentForm" data-id="{{ $comment->id }}" class="reply">
                                                <span><img src="{{ asset('website') }}/images/reply.png" alt="reply"
                                                        class="img-fluid w-100"></span>
                                                {{ __('Reply') }}</a>
                                        </div>
                                    </div>
                                    @if ($comment->children->count() > 0)
                                        @include('components.comment-reply', [
                                            'replies' => $comment->children,
                                        ])
                                    @endif
                                @endforeach
                                <div class="row">
                                    <div class="col-12 wow fadeInUp vis-animation">
                                        <div class="wsus__pagination mt_60">
                                            {{ $comments->links('vendor.pagination.frontend') }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                        <form action="#" class="wsus__blog_details_form wow fadeInUp" id="blogCommentForm">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <input type='hidden' name='parent_id' value='0'>

                            <h4>{{ __('Leave a Comment') }}</h4>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="wsus__blog_details_form_input">
                                        <input type="text" placeholder="{{ __('Your Name') }} *" name="name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__blog_details_form_input">
                                        <input type="email" placeholder="{{ __('Your Email Address') }} *"
                                            name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="wsus__blog_details_form_input">
                                    <textarea rows="6" placeholder="{{ __('Your Comment Here') }}..." name="comment"></textarea>
                                </div>
                            </div>
                            @if ($setting->recaptcha_status == 'active')
                                <div class="col-xl-12 mt-4">
                                    <div class="wsus__contact_form_input mb-3">
                                        <div class="g-recaptcha" data-sitekey="{{ $setting->recaptcha_site_key }}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-xl-12">
                                <div class="wsus__blog_details_form_button">
                                    <button class="common_btn common_btn_2">{{ __('Submit Comment') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-4 wow fadeInUp">
                    <div class="sticky_sidebar">
                        <div class="wsus__blog_details_right">
                            <form action="{{ route('website.blogs') }}"
                                class="wsus__blog_details_right_form mt-0 wow fadeInUp">
                                <input type="text" placeholder="{{ __('Search Here') }}...." name="search">
                                <button type="submit"><i class="far fa-search"></i></button>
                            </form>
                            <div class="wsus__blog_sidebar_wizard wow fadeInUp">
                                <h4>{{ __('Categories') }}</h4>
                                <ul class="wsus__blog_sidebar_category">
                                    @foreach ($categories as $cat)
                                        <li><a href="{{ route('website.blogs') }}?category={{ $cat->slug }}"><i
                                                    class="far fa-angle-right"></i>{{ $cat->title }}
                                                ({{ $cat->blogs->count() }})
                                            </a></li>
                                    @endforeach
                                </ul>
                            </div>
                            @if ($related_blogs->count() > 0)
                                <div class="wsus__blog_sidebar_wizard wow fadeInUp">
                                    <h4>{{ __('Similar Reads') }}</h4>
                                    <ul class="wsus__blog_sidebar_releted_blog">
                                        @foreach ($related_blogs as $relate)
                                            <li>
                                                <a href="{{ route('website.blog-details', $relate->slug) }}">
                                                    <span><img src="{{ asset($relate->image) }}" alt="blog"
                                                            class="img-fluid w-100"></span>
                                                    <b class="title">{{ $relate->title }}</b>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="wsus__blog_sidebar_wizard wow fadeInUp">
                                <h4>{{ __('Tags') }} :</h4>
                                <ul class="wsus__blog_details_tag">
                                    @foreach ($popularTags as $tag)
                                        @php
                                            $tags = json_decode($tag) ?? [];
                                        @endphp
                                        @foreach ($tags as $val)
                                            <li><a href="{{ route('website.blogs') }}?tag={{ $val->value }}">
                                                    {{ $val->value }}</a>
                                            </li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!--============================
        BLOG DETAILS END
    =============================--> --}}
@endsection


@push('scripts')
    <script>
        (function($) {
            "use strict";
            $(document).ready(function() {
                $("#blogCommentForm").on('submit', function(e) {
                    e.preventDefault();
                    if ($("#g-recaptcha-response").val() === '') {
                        e.preventDefault();
                        @if ($setting->recaptcha_status == 'active')
                            toastr.error("Please complete the recaptcha to submit the form")
                            return;
                        @endif
                    }
                    $.ajax({
                        type: 'POST',
                        data: $('#blogCommentForm').serialize(),
                        url: "{{ route('website.comment.post') }}",
                        beforeSend: function() {
                            $(".common_btn").attr("disabled", true);
                            $(".common_btn").html(
                                '<i class="fas fa-spinner fa-spin"></i> {{ ' ' . __('Submitting') }}...'
                            );
                        },
                        success: function(response) {
                            if (response.status == 1) {
                                toastr.success(response.message)
                                $("#blogCommentForm").trigger("reset");
                                $(".common_btn").attr("disabled", false);
                                $(".common_btn").html('{{ __('Submit comment') }}');
                            }
                        },
                        error: function(response) {
                            if (response.responseJSON.errors.name) toastr.error(response
                                .responseJSON.errors.name[0])
                            if (response.responseJSON.errors.email) toastr.error(response
                                .responseJSON.errors.email[0])
                            if (response.responseJSON.errors.comment) toastr.error(response
                                .responseJSON.errors.comment[0])

                            if (!response.responseJSON.errors.name || !response.responseJSON
                                .errors.email || !response.responseJSON.errors.comment) {
                                toastr.error(
                                    "{{ __('Please complete the recaptcha to submit the form') }}"
                                )
                            }
                            $(".common_btn").attr("disabled", false);
                            $(".common_btn").html('{{ __('Submit Comment') }}');
                        }
                    });
                })

                $('.reply').on('click', function() {
                    const parentId = $(this).data('id');
                    console.log(parentId);
                    $("[name='parent_id']").val(parentId);
                })
            });
        })(jQuery);
    </script>
@endpush
