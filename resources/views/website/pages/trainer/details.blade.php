@extends('website.layout.master')

@section('title')
    {{ html_decode($trainer?->user?->name) }} ||
    {{ seoSetting()->where('page_name', 'Trainer Page')->first()->seo_title ?? '' }}
@endsection
@section('meta')
    <meta name="description" content="{{ seoSetting()->where('page_name', 'Trainer Page')->first()->seo_description ?? '' }}">
@endsection


@section('content')
    @include('components.website.breadcrum', ['title' => __('Trainer Details')])

    {{-- <!--============================
        TRAINER DETAILS START
    =============================--> --}}
    <section class="wsus__trainer_details wsus__program_trainer_details pt_120 xs_pt_100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 col-xl-4 wow fadeInLeft">
                    <div class="wsus__single_trainer active mt-0">
                        <img src="{{ asset($trainer->image_url) }}" alt="Trainer" class="img-fluid w-100">
                        <div class="text">
                            <h5 class="title">{{ $trainer?->user?->name }}</h5>
                            <p>{{ $trainer->specialty?->name }}</p>
                        </div>
                        <ul>
                            @if ($trainer->facebook_icon)
                                <li><a href="{{ $trainer->facebook_link }}">
                                        <i class="{{ $trainer->facebook_icon }}"></i>
                                    </a></li>
                            @endif
                            @if ($trainer->twitter_icon)
                                <li><a href="{{ $trainer->twitter_link }}">
                                        <i class="{{ $trainer->twitter_icon }}"></i>
                                    </a></li>
                            @endif
                            @if ($trainer->instagram_icon)
                                <li><a href="{{ $trainer->instagram_link }}">
                                        <i class="{{ $trainer->instagram_icon }}"></i>
                                    </a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-lg-7 col-xl-8 wow fadeInRight">
                    <div class="wsus__trainer_details_text">
                        <h2>{{ $trainer?->user?->name }} <span>{{ $trainer->specialty?->name }}</span></h2>
                        {!! clean(nl2br($trainer->description)) !!}
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="wsus__experience mt_115 xs_mt_95">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <div class="col-lg-6 col-xl-4 wow fadeInLeft">
                    <div class="wsus__experience_img">
                        <img src="{{ asset($pageUtility?->experience_image) }}" alt="Experience" class="img-fluid w-100">
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 wow fadeInRight">
                    <div class="wsus__experience_text">
                        <div class="wsus__section_headeing heading_left">
                            <h2>{{ $pageUtility?->experience_title }}</h2>
                        </div>
                        @foreach (json_decode($trainer->skills) as $id => $skill)
                            <div class="single_bar">
                                <p>{{ $skill->value }}</p>
                                <div id="bar{{ $id + 1 }}" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="100"></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @if (!request()->get('time_table'))
        <section class="wsus__details_class_time mt_120 xs_mt_100 pt_120 xs_pt_100">
            <div class="container">
                <div class="wsus__details_class_bg">
                    <div class="row">
                        <div class="col-lg-6 col-xl-5 wow fadeInLeft">
                            <div class="details_class_time_text wsus__machine_text">
                                <div class="wsus__section_headeing heading_left">
                                    <h2>{{ $pageUtility?->time_table_title }}</h2>
                                </div>
                                <ul>
                                    @foreach ($trainer->workoutClasses as $index => $classTime)
                                        @if ($index == 3)
                                        @break
                                    @endif
                                    <li>
                                        <span>{{ $index + 1 }}</span>
                                        <h3>{{ $classTime->day }}<b>{{ now()->parse($classTime->start_at)->format('h:i A') }}
                                                - {{ now()->parse($classTime->end_at)->format('h:i A') }}</b>
                                        </h3>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ route('website.trainer.details', $trainer->slug) }}?time_table=1"
                                class="common_btn common_btn_2">{{ __('More Details') }}<i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-7 wow fadeInRight">
                        <div class="details_class_time_img">
                            <img src="{{ asset($pageUtility?->class_time_image) }}" alt="Class Time"
                                class="img-fluid w-100">
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endif

@if (request()->get('time_table') == 1)
    <section class="wsus__timetable wsus__timetable_3 pt_100 xs_pt_80">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 wow fadeInUp">
                    <div class="wsus__section_headeing heading_left mb_50">
                        <h2>{{ __('Time table of') }} {{ html_decode($trainer?->user?->name) }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="wsus__timetable_list wsus__timetable_list_3 pb_120 xs_pb_100 wow fadeInUp">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                aria-labelledby="pills-home-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            @php
                                                $days = [
                                                    'sunday',
                                                    'monday',
                                                    'tuesday',
                                                    'wednesday',
                                                    'thursday',
                                                    'friday',
                                                    'saturday',
                                                ];
                                                $workoutClasses = $trainer
                                                    ->workoutClasses()
                                                    ->orderBy('date', 'asc')
                                                    ->orderBy('start_at', 'asc')
                                                    ->whereBetween('date', [
                                                        now()->format('Y-m-d'),
                                                        now()->addDays(7)->format('Y-m-d'),
                                                    ])
                                                    ->get();
                                            @endphp
                                            <tr>
                                                @foreach (range(1, 8) as $index)
                                                    <th></th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($days as $day)
                                                <tr>
                                                    <th class="">
                                                        {{ ucfirst($day) }}
                                                    </th>
                                                    @foreach ($workoutClasses->where('day', ucfirst($day)) as $classTime)
                                                        <td class="blue_bg">
                                                            <h4>{{ $classTime->name }}</h4>
                                                            <p>
                                                                {{ now()->parse($classTime->start_at)->format('h:i A') }}
                                                                -
                                                                {{ now()->parse($classTime->end_at)->format('h:i A') }}
                                                            </p>
                                                        </td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
<section class="wsus__testimonial_2 service_det_testimonial pt_110 xs_pt_90 pb_115 xs_pb_95">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInUp">
                <div class="wsus__section_heading_2 mb_50">
                    <h2>{{ $content?->testimonial_title }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="wsus__testimonial_2_area">
        <div class="row testimonial_2_slider">
            @foreach ($testimonials as $testimonial)
                <div class="col-xl-4">
                    <div class="wsus__testimonial_2_item">
                        <div class="text">
                            <p>{{ $testimonial->translation?->comment }}</p>
                        </div>
                        <div class="wsus__testimonial_2_reviewer">
                            <div class="img">
                                <img src="{{ asset($testimonial->image) }}" alt="review" class="img-fluid w-100">
                            </div>
                            <div class="name">
                                <h4 class="title">{{ $testimonial->translation?->name }}</h4>
                                <p>{{ $testimonial->translation?->designation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@if ($workouts->count() > 0)
    <section class="wsus__program_3 mt_95 xs_mt_75 mb_120 xs_mb_100">
        <div class="container">
            <div class="row">
                @foreach ($workouts as $workout)
                    @php
                        $video = $workout->videos[0];
                    @endphp
                    <div class="col-md-6 col-lg-4 wow fadeInUp">
                        <div class="wsus__program_3_item">
                            <img src="{{ asset($workout->image) }}" alt="program" class="img-fluid w-100">
                            <div class="wsus__program_3_overly">
                                <p>{{ $workout->category?->name }}</p>
                                <div class="text">
                                    @if ($video)
                                        <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                            href="{{ $video['link'] }}">
                                            <i class="fas fa-play"></i>
                                        </a>
                                    @endif
                                    <a href="{{ route('website.workout.details', $workout->slug) }}"
                                        class="title">{{ $workout->name }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
{{-- <!--============================
        TRAINER DETAILS END
    =============================--> --}}
@endsection
