@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Video Gallery Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description"
        content="{{ seoSetting()->where('page_name', 'Video Gallery Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    @include('components.website.breadcrum', ['title' => __('Video Gallery')])
    {{-- <!--============================
        VIDEO GALLERY START
    =============================--> --}}
    <section class="wsus__video_gallery pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            @if ($galleryGroups->count())
                <div class="wsus__timetable_menu text-center">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        @foreach ($galleryGroups as $group)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                                    id="pills-homev{{ $group->id }}-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-homev{{ $group->id }}" type="button" role="tab"
                                    aria-controls="pills-homev{{ $group->id }}"
                                    aria-selected="true">{{ __('Personal Training Services') }}</button>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="tab-content wsus__video_gallery_tabs" id="pills-tabContent">
                    @foreach ($galleryGroups as $group)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="pills-homev{{ $group->id }}" role="tabpanel"
                            aria-labelledby="pills-homev{{ $group->id }}-tab" tabindex="0">
                            <div class="row">

                                @php
                                    $videos = $group->paginatedVideos;

                                    $videos = $videos->map(function ($video) {
                                        return $video->videos;
                                    });
                                @endphp
                                @if (isset($videos[0]))
                                    @foreach ($videos[0] as $vid)
                                        @php
                                            $vid['link'] = str_replace('watch?v=', 'embed/', $vid['link']);
                                        @endphp
                                        <div class="col-xl-6 col-lg-6 wow fadeInUp">
                                            <div class="wsus__video_gallery_item wow fadeInUp">
                                                <iframe src="{{ $vid['link'] }}" title="YouTube video player"
                                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                    referrerpolicy="strict-origin-when-cross-origin"
                                                    allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            @if ($group->paginatedVideos->lastPage() > 1)
                                <div class="row">
                                    <div class="col-12 wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                                        <div class="wsus__pagination mt_60">
                                            {{ $group->paginatedVideos->links('vendor.pagination.frontend') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
            <div class="row">
                @if ($galleryGroups->isEmpty())
                    @include('components.no-data-found', ['message' => __('No data found')])
                @endif
            </div>
        </div>
    </section>
    {{-- <!--============================
        VIDEO GALLERY END
    =============================--> --}}
@endsection
