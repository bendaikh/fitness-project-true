@extends('admin.master_layout')
@section('title')
    <title>{{ __('Locker List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Locker List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Locker List') => '#',
            ]" />

            <div class="section-body">
                <div class="row">
                    {{-- Search filter --}}
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body pb-0">
                                <form action="" method="GET" onchange="this.submit()">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-4 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
                                            <select name="availability" id="availability" class="form-select">
                                                <option value="">{{ __('Availability') }}</option>
                                                <option value="available"
                                                    {{ request('availability') == 'available' ? 'selected' : '' }}>
                                                    {{ __('Available') }}
                                                </option>
                                                <option value="occupied"
                                                    {{ request('availability') == 'occupied' ? 'selected' : '' }}>
                                                    {{ __('Occupied') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
                                            <select name="status" id="status" class="form-select">
                                                <option value="">{{ __('Select Status') }}</option>
                                                <option value="1" {{ request('status') == '1' ? 'selected' : '' }}>
                                                    {{ __('Active') }}
                                                </option>
                                                <option value="0" {{ request('status') == '0' ? 'selected' : '' }}>
                                                    {{ __('In-Active') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
                                            <select name="order_by" id="order_by" class="form-select">
                                                <option value="">{{ __('Order By') }}</option>
                                                <option value="asc"
                                                    {{ request('order_by') == 'asc' ? 'selected' : '' }}>
                                                    {{ __('ASC') }}
                                                </option>
                                                <option value="desc"
                                                    {{ request('order_by') == 'desc' ? 'selected' : '' }}>
                                                    {{ __('DESC') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-lg-4 col-md-4 form-group">
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
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Locker List')" />
                                <div>
                                    @adminCan('locker.create')
                                        <x-admin.add-button href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#add-locker" />
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body text-center">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SL.') }}</th>
                                                <th>{{ __('Locker No') }}</th>
                                                <th>{{ __('Availability') }}</th>
                                                <th>{{ __('Assign To') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @forelse ($lockers as $index => $locker)
                                                <tr>
                                                    <td>{{ $lockers->firstItem() + $index }}</td>
                                                    <td>{{ $locker->locker_no }}</td>
                                                    <td>{{ ucfirst($locker->availability) }}</td>
                                                    <td>
                                                        {{ $locker?->member?->user?->name }}
                                                        @adminCan('locker.assign')
                                                            @if (!$locker?->member && $locker->status == 1 && $locker?->member?->user?->name == null)
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#assign-locker-{{ $locker->id }}"
                                                                    class="btn btn-success btn-sm assign me-2"><i
                                                                        class="fas fa-user-check"></i>
                                                                </a>
                                                            @endif
                                                        @endadminCan
                                                    </td>
                                                    <td>
                                                        @if ($locker->availability != 'occupied')
                                                            <input onchange="changeStatus({{ $locker->id }})"
                                                                id="status_toggle" type="checkbox"
                                                                {{ $locker->status ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                data-offstyle="danger">
                                                        @else
                                                            <input id="status_toggle" type="checkbox"
                                                                {{ $locker->status ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}"
                                                                data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                data-offstyle="danger" disabled>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('locker.edit')
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#edit-locker-{{ $locker->id }}"
                                                                    class="btn btn-primary btn-sm me-2"><i
                                                                        class="fa fa-edit"></i></a>
                                                            @endadminCan
                                                            @adminCan('locker.delete')
                                                                <a href="javascript:;"
                                                                    data-url="{{ route('admin.lockers.destroy', $locker->id) }}"
                                                                    class="btn btn-danger btn-sm delete me-2"><i
                                                                        class="fa fa-trash"></i></a>
                                                            @endadminCan
                                                            @adminCan('locker.view')
                                                                <a href="{{ route('admin.lockers.show', $locker->id) }}"
                                                                    class="btn btn-info btn-sm me-2"><i
                                                                        class="fas fa-eye"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Locker')" route='#add-locker'
                                                    create="{{ checkAdminHasPermission('locker.create') ? 'modal' : '' }}"
                                                    :message="__('No data found!')" colspan="6">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                @if (request()->get('par-page') !== 'all')
                                    <div class="float-right">
                                        {{ $lockers->onEachSide(3)->links() }}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>


    <div class="modal fade" tabindex="-1" role="dialog" id="delete">
        <div class="modal-dialog" role="document">
            <form action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Delete Locker') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <p class="text-danger">{{ __('Are You Sure to Delete this Locker?') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ __('Yes, Delete') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @adminCan('locker.create')
        <div>
            <div class="modal fade" tabindex="-1" role="dialog" id="add-locker">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('admin.lockers.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Create Locker') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"al" aria-label="Close">
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="locker_no">{{ __('Locker No') }}</label>
                                            <input type="text" name="locker_no" class="form-control" id="locker_no"
                                                required value="{{ old('locker_no') }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select name="status" id="status" class="form-select">
                                                <option value="1">
                                                    {{ __('Active') }}</option>
                                                <option value="0">
                                                    {{ __('Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="availability">{{ __('Availability') }}</label>
                                            <select name="availability" id="availability" class="form-select">
                                                <option value="available"
                                                    {{ old('availability') == 'available' ? 'selected' : '' }}>
                                                    {{ __('Available') }}</option>
                                                <option value="occupied"
                                                    {{ old('availability') == 'occupied' ? 'selected' : '' }}>
                                                    {{ __('Not Available') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                                    <x-admin.save-button :text="__('Save')"></x-admin.save-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endadminCan
    @foreach ($lockers as $locker)
        {{-- assign modal --}}
        @include('admin.pages.lockers.assign-locker', ['locker' => $locker])

        <div>
            <div class="modal fade" tabindex="-1" role="dialog" id="edit-locker-{{ $locker->id }}">
                <div class="modal-dialog" role="document">
                    <form action="{{ route('admin.lockers.update', $locker->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">{{ __('Edit Locker') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">

                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="locker_no">{{ __('Locker No') }}</label>
                                            <input type="text" name="locker_no" class="form-control" id="locker_no"
                                                required value="{{ $locker->locker_no }}"
                                                @if ($locker->availability == 'occupied') readonly @endif>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="status">{{ __('Status') }}</label>
                                            <select name="status" id="status" class="form-select">
                                                <option value="1" {{ $locker->status == 1 ? 'selected' : '' }}>
                                                    {{ __('Active') }}</option>
                                                <option value="0" {{ $locker->status == 0 ? 'selected' : '' }}>
                                                    {{ __('Inactive') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="availability">{{ __('Availability') }}</label>
                                            <select name="availability" id="availability" class="form-select">
                                                <option value="available"
                                                    {{ $locker->availability == 'available' ? 'selected' : '' }}>
                                                    {{ __('Available') }}</option>
                                                <option value="occupied"
                                                    {{ $locker->availability == 'occupied' ? 'selected' : '' }}>
                                                    {{ __('Not Available') }}</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">{{ __('Close') }}</button>
                                    <button type="button" class="btn btn-success locker_update_button"
                                        data-id="{{ $locker->id }}">{{ __('Update') }}</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>



        {{-- modal for confirmation --}}

        <div class="modal fade" tabindex="-1" role="dialog" id="confirm-availibility">
            <div class="modal-dialog" role="document">
                <form action="{{ route('admin.lockers.update', $locker->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="availability">
                    <input type="hidden" name="status">
                    <input type="hidden" name="locker_no">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ __('Confirm Availability') }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"al" aria-label="Close">

                            </button>
                        </div>
                        <div class="modal-body">
                            <p class="text-danger">
                                {{ __('Are you sure you want to clear the locker and remove the member?') }}
                            </p>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger"
                                data-bs-dismiss="modal">{{ __('Close') }}</button>
                            <button type="submit" class="btn btn-success">{{ __('Yes, Change') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        @include('components.admin.preloader')
    @endforeach
@endsection




@push('js')
    <script>
        'use strict'
        $(document).ready(function() {

            'use strict'
            $('[name="assign_member"]').on('change', function() {
                if ($(this).is(':checked')) {
                    $('.member').removeClass('d-none');
                    $('#member_id').attr('disabled', false);
                } else {
                    $('.member').addClass('d-none');
                    $('#member_id').attr('disabled', true)
                }
            });
            $('.delete').on('click', function(e) {
                e.preventDefault();
                const modal = $('#delete');
                modal.find('form').attr('action', $(this).data('url'));
                modal.modal('show');
            })
            $('.locker_update_button').on('click', function() {
                $('.preloader_area').removeClass('d-none');
                const availability = $(this).closest('form').find('[name="availability"]');
                const status = $(this).closest('form').find('[name="status"]');
                const lockerNumber = $(this).closest('form').find('[name="locker_no"]');
                const form = $(this).closest('form');
                const id = $(this).data('id');

                const formRoute = $(this).closest('form').attr('action');
                $.ajax({
                    url: "{{ route('admin.locker.available', '') }}/" + id,
                    success: function({
                        availability: avail
                    }) {

                        if ((availability.val() == 'available' && avail ==
                                'occupied') || (
                                avail == 'occupied' && status
                                .val() == 0)) {
                            // previous modal close
                            $('#edit-locker-' + id).modal('hide');

                            // open the modal
                            const modal = $('#confirm-availibility');
                            modal.find('form').attr('action', formRoute);

                            // add the value to the modal
                            modal.find('[name="availability"]').val(availability
                                .val());
                            modal.find('[name="status"]').val(status.val());
                            modal.find('[name="locker_no"]').val(lockerNumber
                                .val());
                            // show the modal
                            modal.modal('show');
                            $('.preloader_area').addClass('d-none');
                        } else {
                            form.submit();
                        }

                    },
                    error: function(err) {
                        handleFetchError(err);
                        $('.preloader_area').addClass('d-none');
                    }
                })
            })
        });


        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ route('admin.locker.status', '') }}" + "/" + id,
                success: function(response) {
                    if (response.status == 'success') {
                        toastr.success(response.message);
                    } else {
                        toastr.warning(response.message);
                    }
                },
                error: function(err) {
                    handleFetchError(err);

                }
            })
        }
    </script>
@endpush
