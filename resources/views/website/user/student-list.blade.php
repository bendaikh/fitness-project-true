@extends('website.user.layout.layout')

@section('title', 'Student List')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Student List') }}</h4>
        <div class="dash_student_list">
            <div class="row">
                @if ($students->count() > 0)
                    <div class="col-12 wow fadeInUp">
                        <div class="table-responsive">
                            <table class="table mt_30">
                                <thead>
                                    <tr>
                                        <th class="">{{ __('Serial') }}</th>
                                        <th class="">{{ __('Student Name') }}</th>
                                        <th class="">{{ __('Phone Number') }}</th>
                                        <th class="">{{ __('Enrolled Workout') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($students as $index => $student)
                                        <tr>
                                            <td class="">{{ $students->firstItem() + $index }}</td>
                                            <td class="">{{ $student->user->name }}</td>
                                            <td class="">{{ $student->user->phone }}</td>
                                            <td class="">

                                                @foreach ($student->user->workouts as $workout)
                                                    {{ $workout->name }}
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    @include('components.no-data-found', [
                        'message' => __('No Student Found'),
                    ])
                @endif
            </div>

            @if ($students->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp vis-animation">
                        <div class="wsus__pagination mt_60">
                            {{ $students->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
