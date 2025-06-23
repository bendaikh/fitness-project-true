@extends('admin.master_layout')
@section('title')
    <title>{{ __('Tax List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Tax List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Tax List') => '#',
            ]" />

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Tax List')" />
                                @adminCan('tax.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.tax.create')" text="{{ __('Add Tax') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Tax') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($taxes as $index => $tax)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $tax->name }}</td>
                                                    <td>{{ $tax->rate }} %</td>
                                                    <td>
                                                        @if ($tax->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $tax->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $tax->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('tax.edit')
                                                                <a href="{{ route('admin.tax.edit', $tax->id) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('tax.delete')
                                                                @if ($tax->products->count() == 0)
                                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal"
                                                                        class="btn btn-danger btn-sm me-2"
                                                                        onclick="deleteData({{ $tax->id }})"><i
                                                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                                                @else
                                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                                        data-bs-target="#canNotDeleteModal"
                                                                        class="btn btn-danger btn-sm" disabled><i
                                                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                                                @endif
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Tax')"
                                                    route="{{ checkAdminHasPermission('product.category.create') ? 'admin.tax.create' : '' }}"
                                                    create="yes" :message="__('No data found!')" colspan="7"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="canNotDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    {{ __('You can not delete this item. Because there are one or more products has been created in this item.') }}
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        "use strict";

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ route('admin.tax.destroy', '') }}' + "/" + id)
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ route('admin.tax.status', '') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response.success)
                },
                error: function(err) {
                    handleFetchError(err);

                }
            })
        }
    </script>
@endsection
