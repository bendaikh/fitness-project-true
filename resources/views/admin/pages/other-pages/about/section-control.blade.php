@extends('admin.master_layout')
@section('title')
    <title>{{ __('About Section Control') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('About Section Control') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('About Section Control') => '#',
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
                                                    <td>{{ __('About Section') }}</td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->about_section_visibility)
                                                                    ? $section?->about_section_visibility
                                                                    : 0;
                                                            @endphp

                                                            <input name="about_section_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="about_section_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Why Choose Us') }}</td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->choose_us_section_visibility)
                                                                    ? $section?->choose_us_section_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="choose_us_section_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">
                                                            @if (!$check)
                                                                <input type="hidden" name="choose_us_section_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Support Section') }}
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->support_section_visibility)
                                                                    ? $section?->support_section_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="support_section_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="support_section_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Exercise Section') }}
                                                    </td>
                                                    <td>
                                                        <label class="switch">

                                                            @php
                                                                $check = isset($section?->exercise_section_visibility)
                                                                    ? $section?->exercise_section_visibility
                                                                    : 0;
                                                            @endphp

                                                            <input name="exercise_section_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="exercise_section_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Trainer Section') }}
                                                    </td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset($section?->about_trainer_visibility)
                                                                    ? $section?->about_trainer_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="about_trainer_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="about_trainer_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Testimonial Section') }}
                                                    </td>
                                                    <td>
                                                        <label class="switch">

                                                            @php
                                                                $check = isset($section?->about_testimonial_visibility)
                                                                    ? $section?->about_testimonial_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="about_testimonial_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">

                                                            @if (!$check)
                                                                <input type="hidden" name="about_testimonial_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>{{ __('Call to Action') }}</td>
                                                    <td>
                                                        <label class="switch">
                                                            @php
                                                                $check = isset(
                                                                    $section?->about_call_to_action_visibility,
                                                                )
                                                                    ? $section?->about_call_to_action_visibility
                                                                    : 0;
                                                            @endphp
                                                            <input name="about_call_to_action_visibility" type="checkbox"
                                                                {{ $check == 1 ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                data-offstyle="danger" value="{{ $check }}">
                                                            @if (!$check)
                                                                <input type="hidden" name="about_call_to_action_visibility"
                                                                    value='0'>
                                                            @endif
                                                        </label>
                                                    </td>
                                                </tr>
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

                    // remove all hidden input with the same name

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
