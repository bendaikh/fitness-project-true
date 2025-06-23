@extends('admin.master_layout')
@section('title')
    <title>{{ __('Coupon List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Coupon List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Coupon List') => '#',
            ]" />
            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12">
                        <div class="card ">

                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Coupon List')" />
                                @adminCan('coupon.create')
                                    <div>
                                        <x-admin.add-button href="javascript:;" data-bs-toggle="modal"
                                            data-bs-target="#create_coupon_id" text="{{ __('Add Coupon') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Coupon Code') }}</th>
                                                <th>{{ __('Min Price') }}</th>
                                                <th>{{ __('Offer') }}</th>
                                                <th>{{ __('End time') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($coupons as $index => $coupon)
                                                <tr>
                                                    <td>{{ $coupons->firstItem() + $index }}</td>
                                                    <td>{{ $coupon->coupon_code }}</td>
                                                    <td>{{ $coupon->min_price ? currency($coupon->min_price) : '' }}</td>
                                                    <td>
                                                        @if ($coupon->offer_type == 1)
                                                            {{ $coupon->discount }}%
                                                        @else
                                                            {{ currency($coupon->discount) }}
                                                        @endif
                                                    </td>

                                                    <td>{{ date('d M Y', strtotime($coupon->expired_date)) }}</td>

                                                    <td>
                                                        <input onchange="changeStatus({{ $coupon->id }})"
                                                            id="status_toggle" type="checkbox"
                                                            {{ $coupon->status == 'active' ? 'checked' : '' }}
                                                            data-toggle="toggle" data-on="{{ __('Active') }}"
                                                            data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                            data-offstyle="danger">
                                                    </td>

                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('coupon.edit')
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#edit_coupon_id_{{ $coupon->id }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('coupon.delete')
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $coupon->id }})"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Coupon')" route='#create_coupon_id' create="modal"
                                                    :message="__('No data found!')" colspan="7">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $coupons->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @foreach ($coupons as $index => $coupon)
        <div class="modal fade" id="edit_coupon_id_{{ $coupon->id }}" tabindex="-1" role="dialog"
            aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Edit Coupon') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body pb-0">
                        <div class="container-fluid">
                            <form action="{{ route('admin.coupon.update', $coupon->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">{{ __('Coupon Code') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="coupon_code" autocomplete="off" class="form-control"
                                        value="{{ $coupon->coupon_code }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('Minimum purchase price') }} <span data-toggle="tooltip"
                                            data-placement="top" class="fa fa-info-circle text--primary"
                                            title="Price should be in ({{ currency() }})"></label>
                                    <input type="text" name="min_price" autocomplete="off" class="form-control"
                                        value="{{ $coupon->min_price }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('Max Quantity') }} <span
                                            class="text-danger">*</span></label>
                                    <input type="text" name="max_quantity" autocomplete="off" class="form-control"
                                        value="{{ $coupon->max_quantity }}">
                                </div>
                                <div class="form-group">
                                    <label for="">{{ __('Offer') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="discount" autocomplete="off" class="form-control"
                                        value="{{ $coupon->discount }}">
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('Discount Type') }} <span
                                            class="text-danger">*</span></label>
                                    <select name="offer_type" class="form-select">
                                        <option value="1" @if ($coupon->offer_type == 1) selected @endif>
                                            {{ __('Percentage') }}</option>
                                        <option value="2" @if ($coupon->offer_type == 2) selected @endif>
                                            {{ __('Flat') }}</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="">{{ __('End time') }} <span class="text-danger">*</span></label>
                                    <input type="text" name="expired_date" autocomplete="off"
                                        class="form-control datepicker" value="{{ $coupon->expired_date }}"
                                        autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                    <select name="status" id="" class="form-select">
                                        <option {{ $coupon->status == 'active' ? 'selected' : '' }} value="active">
                                            {{ __('Active') }}</option>
                                        <option {{ $coupon->status == 'inactive' ? 'selected' : '' }} value="inactive">
                                            {{ __('Inactive') }}</option>
                                    </select>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger"
                            data-bs-dismiss="modal">{{ __('Close') }}</button>
                        <x-admin.update-button :text="__('Update')">
                        </x-admin.update-button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach


    <!-- Modal -->
    <div class="modal fade" id="create_coupon_id" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Create Coupon') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body pb-0">
                    <div class="container-fluid">
                        <form action="{{ route('admin.coupon.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">{{ __('Coupon Code') }} <span class="text-danger">*</span></label>
                                <input type="text" name="coupon_code" autocomplete="off" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Minimum purchase price') }} <span data-toggle="tooltip"
                                        data-placement="top" class="fa fa-info-circle text--primary"
                                        title="Price should be in ({{ currency() }})"></label>
                                <input type="text" name="min_price" autocomplete="off" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Max Quantity') }} <span class="text-danger">*</span></label>
                                <input type="text" name="max_quantity" autocomplete="off" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Discount') }} <span class="text-danger">*</span></label>
                                <input type="text" name="discount" autocomplete="off" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('Discount Type') }} <span
                                        class="text-danger">*</span></label>
                                <select name="offer_type" class="form-select">
                                    <option value="1">{{ __('Percentage') }}</option>
                                    <option value="2">{{ __('Flat') }}</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">{{ __('End time') }} <span class="text-danger">*</span></label>
                                <input type="text" name="expired_date" autocomplete="off"
                                    class="form-control datepicker" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label>{{ __('Status') }} <span class="text-danger">*</span></label>
                                <select name="status" id="" class="form-select">
                                    <option value="active">{{ __('Active') }}</option>
                                    <option value="inactive">{{ __('Inactive') }}</option>
                                </select>
                            </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    <x-admin.save-button :text="__('Save')">
                    </x-admin.save-button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        "use strict"

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/coupon/') }}' + "/" + id)
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ route('admin.coupon.status', '') }}" + "/" + id,
                success: function(response) {
                    if (response.success) {
                        toastr.success(response.message);
                    }
                },
                error: function(err) {
                    handleFetchError(err);
                }
            });
        }
    </script>
@endsection
