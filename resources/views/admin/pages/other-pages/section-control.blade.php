@extends('admin.master_layout')
@section('title')
    <title>{{ __('Homepage Section Control') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Homepage Section Control') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Homepage Section Control') => '#',
            ]" />
            <div class="section-body">
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <form action="{{ route('admin.section.control.store') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card">
                                <div class="card-body text-center">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-left">
                                                <tr>
                                                    <th width="70%">{{ __('Section') }}</th>
                                                    <th width="30%">{{ __('Visibility') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody class="text-left">
                                                <tr>
                                                    <td>{{ __('Slider') }}</td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->slider_visibility)
                                                                    ? $section?->slider_visibility
                                                                    : 0;
                                                            @endphp

                                                            <input name="slider_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="slider_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Workout') }}</td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->workout_visibility)
                                                                    ? $section?->workout_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="workout_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">
                                                            @if (!$check)
                                                                <input type="hidden" name="workout_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td>{{ __('Machine Section') }}
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->machine_visibility)
                                                                    ? $section?->machine_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="machine_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="machine_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                @if (THEME == '1' || THEME == '4' || THEME == 'all')
                                                    <tr>
                                                        <td>{{ __('Counter Section') }}
                                                        </td>
                                                        <td>
                                                            <label class="switch">

                                                                @php
                                                                    $check = isset($section?->counter_visibility)
                                                                        ? $section?->counter_visibility
                                                                        : 0;
                                                                @endphp

                                                                <input name="counter_visibility" type="checkbox"
                                                                    {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                    data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger" value="{{ $check }}">

                                                                @if (!$check)
                                                                    <input type="hidden" name="counter_visibility"
                                                                        value='0'>
                                                                @endif
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td>{{ __('Trainer Section') }}
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->trainer_visibility)
                                                                    ? $section?->trainer_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="trainer_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="trainer_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                @if (THEME != '2')
                                                    <tr>
                                                        <td>{{ __('Video Section') }}</td>
                                                        <td>
                                                            <label class="switch">
                                                                @php
                                                                    $check = isset($section?->video_visibility)
                                                                        ? $section?->video_visibility
                                                                        : 0;
                                                                @endphp
                                                                <input name="video_visibility" type="checkbox"
                                                                    {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                    data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger" value="{{ $check }}">

                                                                @if (!$check)
                                                                    <input type="hidden" name="video_visibility"
                                                                        value='0'>
                                                                @endif
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (THEME == '1' || THEME == '4' || THEME == 'all')
                                                    <tr>
                                                        <td>{{ __('Brand Section') }}</td>

                                                        <td>
                                                            <label class="switch">

                                                                @php
                                                                    $check = isset($section?->brand_visibility)
                                                                        ? $section?->brand_visibility
                                                                        : 0;
                                                                @endphp

                                                                <input name="brand_visibility" type="checkbox"
                                                                    {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                    data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger" value="{{ $check }}">

                                                                @if (!$check)
                                                                    <input type="hidden" name="brand_visibility"
                                                                        value='0'>
                                                                @endif
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (THEME != '3')
                                                    <tr>
                                                        <td>{{ __('Pricing Section') }}</td>
                                                        <td>
                                                            <label class="switch">
                                                                @php
                                                                    $check = isset($section?->pricing_visibility)
                                                                        ? $section?->pricing_visibility
                                                                        : 0;
                                                                @endphp
                                                                <input name="pricing_visibility" type="checkbox"
                                                                    {{ $check == 1 ? 'checked' : '' }}
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}"
                                                                    data-onstyle="success" data-offstyle="danger"
                                                                    value="{{ $check }}">

                                                                @if (!$check)
                                                                    <input type="hidden" name="pricing_visibility"
                                                                        value='0'>
                                                                @endif
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td>{{ __('Testimonial Section') }}
                                                    </td>
                                                    <td>
                                                        <label class="switch">

                                                            @php
                                                                $check = isset($section?->testimonial_visibility)
                                                                    ? $section?->testimonial_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="testimonial_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="testimonial_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                @if (THEME == '3' || THEME == 'all')
                                                    <tr>
                                                        <td>{{ __('Service') }}</td>
                                                        <td>
                                                            <label class="switch">
                                                                @php
                                                                    $check = isset($section?->service_visibility)
                                                                        ? $section?->service_visibility
                                                                        : 0;
                                                                @endphp
                                                                <input name="service_visibility" type="checkbox"
                                                                    {{ $check == 1 ? 'checked' : '' }}
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}"
                                                                    data-onstyle="success" data-offstyle="danger"
                                                                    value="{{ $check }}">
                                                                @if (!$check)
                                                                    <input type="hidden" name="service_visibility"
                                                                        value='0'>
                                                                @endif
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                                <tr>
                                                    <td>{{ __('Blog') }}</td>
                                                    <td>
                                                        <label class="switch">

                                                            @php
                                                                $check = isset($section?->blog_visibility)
                                                                    ? $section?->blog_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="blog_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">
                                                            @if (!$check)
                                                                <input type="hidden" name="blog_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                @if (THEME == '3' || THEME == '2' || THEME == 'all')
                                                    <tr>
                                                        <td>{{ __('Call to Action') }}</td>
                                                        <td>
                                                            <label class="switch">
                                                                @php
                                                                    $check = isset($section?->call_to_action_visibility)
                                                                        ? $section?->call_to_action_visibility
                                                                        : 0;
                                                                @endphp
                                                                <input name="call_to_action_visibility" type="checkbox"
                                                                    {{ $check == 1 ? 'checked' : '' }}
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}"
                                                                    data-onstyle="success" data-offstyle="danger"
                                                                    value="{{ $check }}">
                                                                @if (!$check)
                                                                    <input type="hidden" name="call_to_action_visibility"
                                                                        value='0'>
                                                                @endif
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif
                                                @if (THEME != '1' && THEME != '4')
                                                    <tr>
                                                        <td>{{ __('Products') }}
                                                        </td>
                                                        <td>
                                                            <label class="switch">
                                                                @php
                                                                    $check = isset($section?->products_visibility)
                                                                        ? $section?->products_visibility
                                                                        : 0;
                                                                @endphp
                                                                <input name="products_visibility" type="checkbox"
                                                                    {{ $check == 1 ? 'checked' : '' }}
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}"
                                                                    data-onstyle="success" data-offstyle="danger"
                                                                    value="{{ $check }}">
                                                                @if (!$check)
                                                                    <input type="hidden" name="products_visibility"
                                                                        value='0'>
                                                                @endif
                                                            </label>
                                                        </td>
                                                    </tr>
                                                @endif


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer text-center">
                                    <x-admin.save-button :text="__('Save Changes')"></x-admin.save-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('js')
    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').on('change', function() {
                if ($(this).prop('checked')) {
                    $(this).val(1);

                    // remove hidden input from form
                    $('input[type="hidden"][name="' + $(this).attr('name') + '"]').remove();
                } else {
                    $(this).val(0);
                    // add hidden input to form with 0
                    $(this).after('<input type="hidden" name="' + $(this).attr('name') + '" value="0">');
                }
            });
        });
    </script>
@endpush
