@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Award Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Award Page')->first()->seo_description ?? '' }}">
@endsection

@section('content')
    @include('components.website.breadcrum', ['title' => __('Award')])
    {{-- <!--============================
        AWARD START
    =============================--> --}}
    <section class="wsus__award pt_105 xs_pt_85 pb_120 xs_pb_100">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="wsus__award_heading mb_35">
                        <h2>{{ $pageUtility->award_title }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse ($awards as $award)
                    <div class="col-xl-12">
                        <a href="javascript:;" class="wsus__award_item">
                            <p class="name">{{ $award->name }}</p>
                            <p class="award">({{ now()->parse($award->date)->format('d-m-Y') }}) -
                                {{ $award->description }}</p>
                            <p class="winner">
                                @if ($award->type = 'winner')
                                    {{ __('Winner') }}
                                @elseif($award->type = 'runner_up')
                                    {{ __('Runner Up') }}
                                @else
                                    {{ __('Participant') }}
                                @endif
                            </p>
                            <span><img src="{{ asset($award->image_url) }}" alt="award" class="img-fluid w-100"></span>
                        </a>
                    </div>
                @empty
                    @include('components.no-data-found', ['message' => __('No Awards Found!')])
                @endforelse
            </div>
            @if ($awards->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp">
                        <div class="wsus__pagination mt_60">
                            {{ $awards->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    {{-- <!--============================
        AWARD END
    =============================--> --}}
@endsection
