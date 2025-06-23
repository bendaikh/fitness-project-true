@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Image Gallery Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description"
        content="{{ seoSetting()->where('page_name', 'Image Gallery Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    @include('components.website.breadcrum', ['title' => __('Photo Gallery')])
    {{-- <!--============================
            PHOTO GALLERY START
        =============================--> --}}

    <section class="wsus__photo_gallery wsus__gallery_page pt_120 xs_pt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                @if ($galleryGroups->count())
                    <div class="col-xl-12">
                        <div class="wsus__timetable_menu text-center">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                @foreach ($galleryGroups as $group)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" id="pills-homep1-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-homep{{ $group->id }}"
                                            type="button" role="tab" aria-controls="pills-homep{{ $group->id }}"
                                            aria-selected="true">{{ $group->name }}</button>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="tab-content wsus__photo_gallery_tab_contant" id="pills-tabContent">
                            @foreach ($galleryGroups as $group)
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                    id="pills-homep{{ $group->id }}" role="tabpanel"
                                    aria-labelledby="pills-homep{{ $group->id }}-tab" tabindex="0">
                                    <div class="row">
                                        @php
                                            $images = $group->paginatedImages;
                                            $images = $images->map(function ($image) {
                                                return $image->image_url;
                                            });
                                            $images = $images->flatten();
                                        @endphp
                                        @foreach ($images as $img)
                                            <div class="col-sm-6 col-lg-4 col-xl-3 wow fadeInUp">
                                                <a class="wsus__photo_gallery_item venobox" data-gall="gallery01"
                                                    href="{{ asset($img) }}">
                                                    <img src="{{ asset($img) }}" alt="gallery1" class="img-fluid w-100">
                                                    <div class="icon">
                                                        <i class="far fa-plus"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                    @if ($group->paginatedImages->lastPage() > 1)
                                        <div class="row">
                                            <div class="col-12 wow fadeInUp"
                                                style="visibility: visible; animation-name: fadeInUp;">
                                                <div class="wsus__pagination mt_60">
                                                    {{ $group->paginatedImages->links('vendor.pagination.frontend') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                @if ($galleryGroups->isEmpty())
                    @include('components.no-data-found', ['message' => __('No data found')])
                @endif
            </div>
        </div>
    </section>
    {{-- <!--============================
        PHOTO GALLERY END
    =============================--> --}}
@endsection
