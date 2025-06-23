@extends('admin.master_layout')
@section('title')
    <title>{{ __('Attendance') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Attendance') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Attendance') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="" method="GET" id="search-form" onchange="this.submit();">
                                    <div class="row">
                                        <div class="col-md-3 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search by name or ID') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 form-group">
                                            <select name="subscription_status" id="subscription_status" class="form-select">
                                                <option value="">{{ __('Subscription Status') }}</option>
                                                <option value="all">{{ __('All') }}</option>
                                                <option value="1"
                                                    {{ request('subscription_status') == '1' ? 'selected' : '' }}>
                                                    {{ __('Active') }}
                                                </option>
                                                <option value="expired"
                                                    {{ request('subscription_status') == 'expired' ? 'selected' : '' }}>
                                                    {{ __('Expired') }}
                                                </option>
                                                <option value="no_plan"
                                                    {{ request('subscription_status') == 'no_plan' ? 'selected' : '' }}>
                                                    {{ __('No Plan') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-3 form-group">
                                            <select name="par-page" id="par-page" class="form-select">
                                                <option value="">{{ __('Per Page') }}</option>
                                                <option value="10" {{ '10' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('10') }}
                                                </option>
                                                <option value="50" {{ '50' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('50') }}
                                                </option>
                                                <option value="100"
                                                    {{ '100' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('100') }}
                                                </option>
                                                <option value="all"
                                                    {{ 'all' == request('par-page') ? 'selected' : '' }}>
                                                    {{ __('All') }}
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-3 form-group">
                                            <input type="text" name="date" class="form-control datepicker"
                                                value="{{ request()->get('date') ?? now()->format('Y-m-d') }}"
                                                placeholder="{{ __('Date') }}" data-date-end-date="0d"
                                                autocomplete="off">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @php
                        $currentDate = request()->get('date') ?? now()->format('Y-m-d');
                    @endphp
                    <div class="col-12">
                        <div class="card  {{ !$currentDate ? 'd-none' : '' }}">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Member List') }}</h4>
                                <div class="attendance_type d-none d-flex justify-content-center align-items-center">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="attendance_type" value="present"
                                                class="selectgroup-input">
                                            <span
                                                class="selectgroup-button selectgroup-button-icon">{{ __('Present') }}</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="attendance_type" value="absent"
                                                class="selectgroup-input">
                                            <span
                                                class="selectgroup-button selectgroup-button-icon">{{ __('Absent') }}</span>
                                        </label>
                                    </div>
                                    <div class="button-container d-none">
                                        <button class="btn btn-success ms-2 submit-button"
                                            type="submit">{{ __('Apply') }}</button>
                                    </div>
                                </div>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <div class="custom-checkbox custom-control">
                                                        <input type="checkbox" data-checkbox-role="dad"
                                                            class="custom-control-input" id="checkbox-all">
                                                        <label for="checkbox-all"
                                                            class="custom-control-label">&nbsp;</label>
                                                    </div>
                                                </th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Member ID') }}</th>
                                                <th>{{ __('Status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if ($currentDate)
                                                @foreach ($members as $key => $member)
                                                    @php
                                                        $atten = $member->attendance
                                                            ->where('date', $currentDate)
                                                            ->first();
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="custom-checkbox custom-control">
                                                                <input type="checkbox" data-checkboxes="mygroup"
                                                                    class="custom-control-input"
                                                                    id="checkbox-{{ $key }}"
                                                                    {{ $atten ? 'checked' : '' }}>
                                                                <label for="checkbox-{{ $key }}"
                                                                    class="custom-control-label">&nbsp;</label>
                                                            </div>
                                                        </td>

                                                        <td>{{ $member->user?->name }}</td>
                                                        <td>{{ $member->member_id }}</td>
                                                        <td>
                                                            <div class="selectgroup w-100" data-id="{{ $member->id }}">
                                                                <label class="selectgroup-item">
                                                                    <input type="radio"
                                                                        name="attendance[{{ $key }}]"
                                                                        value="present" class="selectgroup-input"
                                                                        {{ $atten?->status == 'present' ? 'checked' : '' }}>
                                                                    <span
                                                                        class="selectgroup-button selectgroup-button-icon">{{ __('Present') }}</span>
                                                                </label>
                                                                <label class="selectgroup-item">
                                                                    <input type="radio"
                                                                        name="attendance[{{ $key }}]"
                                                                        value="absent" class="selectgroup-input"
                                                                        {{ $atten?->status == 'absent' ? 'checked' : '' }}>
                                                                    <span
                                                                        class="selectgroup-button selectgroup-button-icon">{{ __('Absent') }}</span>
                                                                </label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    @if (request()->get('date'))
                                        {{ $members->onEachSide(3)->links() }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection



@push('js')
    <script>
        'use strict';
        $(document).ready(function() {
            $(document).on('change', '.selectgroup-input', function() {
                var id = $(this).closest('.selectgroup').data('id');
                var value = $(this).val();

                // check if closest [data-checkboxes="mygroup"]  is checked
                if ($('[data-checkboxes="mygroup"]:checked').length > 0) {
                    return;
                }
                const data = {
                    member_id: [id],
                    attendance: [value],
                }

                updateStatus(data)
            })

            $('#checkbox-all').on('change', function() {
                $('[data-checkboxes="mygroup"]').prop('checked', $(this).prop('checked'));

                // enable and disabled the input fields based on checkbox state
                $('[data-checkboxes="mygroup"]').each(function() {
                    var isChecked = $(this).prop('checked');
                    var index = $(this).attr('id').split('-')[
                        1]; // Extract index from checkbox ID

                    if (isChecked) {
                        $('.attendance_type').removeClass('d-none');
                    } else {
                        $('.attendance_type').addClass('d-none');
                    }
                });
                const val = $('[name="attendance_type"]:checked').val();
                changeSelectedValue(val)
            });

            $('[data-checkboxes="mygroup"]').on('change', updateSelectAllCheckbox);

            $('[name="attendance_type"]').on('change', function() {
                const val = $(this).val();
                changeSelectedValue(val)

                $('.button-container').removeClass('d-none');
            })

            $('.submit-button').on('click', function(e) {
                const data = {
                    member_id: [],
                    attendance: [],
                }
                $('[class="selectgroup-input"]:checked').each(function() {
                    const input = $(this).parents('tr').find('[data-checkboxes="mygroup"]:checked');
                    if (input.length && $(this).closest('.selectgroup').data('id')) {

                        data.member_id.push($(this).closest('.selectgroup').data('id'));
                        data.attendance.push($(this).val());
                    }
                })
                updateStatus(data)
            });

            $('.filter-button').on('click', function(e) {
                e.preventDefault();

                // check if date is selected
                if ($('.datepicker').val() == '') {
                    toastr.warning("{{ __('Please select date') }}");
                } else {
                    $('#search-form').submit();
                }
            })
        })

        function updateStatus(data) {
            const date = "{{ $currentDate }}"
            if (data.attendance.length > 0) {
                $.ajax({
                    type: "post",
                    data: {
                        _token: '{{ csrf_token() }}',
                        date,
                        ...data
                    },
                    url: "{{ route('admin.attendance.store') }}",
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message);
                        } else {
                            toastr.warning(response.message);
                        }
                    },
                    error: function(error) {
                        handleFetchError(error);
                    }
                })
            } else {
                toastr.warning("Please mark attendance");
            }
        }

        function updateSelectAllCheckbox() {
            var allChecked = true;
            let count = 0;
            $('[data-checkboxes="mygroup"]').each(function() {
                if (!$(this).is(':checked')) {
                    allChecked = false;
                } else {
                    count++;
                }
            });

            if (count > 0) {
                $('.attendance_type').removeClass('d-none');
                $('.button-container').removeClass('d-none');
            } else {
                $('.attendance_type').addClass('d-none');
                $('.button-container').addClass('d-none');
            }

            $('#checkbox-all').prop('checked', allChecked);

            // check if this is checked

            const input = $(this).closest('tr').find('.selectgroup-input');
            const val = $('[name="attendance_type"]:checked').val();

            if ($(this).is(':checked')) {
                input.each(function() {
                    if ($(this).val() == val) {
                        $(this).prop('checked', true);
                        $(this).trigger('change');
                    }
                })
            } else {
                input.each(function() {
                    if ($(this).val() == val) {
                        $(this).prop('checked', false);
                        $(this).trigger('change');
                    }
                })
            }
        }

        function changeSelectedValue(val) {

            $('[data-checkboxes="mygroup"]:checked').each(function() {
                const input = $(this).closest('tr').find('.selectgroup-input');
                input.each(function() {
                    if ($(this).val() == val) {
                        $(this).prop('checked', true);
                        $(this).trigger('change');
                    }
                })
            });

            $('[data-checkboxes="mygroup"]:not(:checked)').each(function() {
                const input = $(this).closest('tr').find('.selectgroup-input');
                input.each(function() {
                    if ($(this).is(':checked')) {
                        $(this).prop('checked', false);
                        $(this).trigger('change');
                    }
                })
            });
        }
    </script>
@endpush
