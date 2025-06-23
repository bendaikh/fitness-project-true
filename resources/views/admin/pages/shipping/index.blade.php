@extends('admin.master_layout')
@section('title')
    <title>{{ __('Shipping List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Shipping List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Shipping List') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Shipping List')" />
                                @adminCan('shipping.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.shipping.create')" text="{{ __('Add Shipping') }}" />
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
                                                <th>{{ __('Fee') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($shippings as $index => $shipping)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $shipping->name }}</td>
                                                    <td>
                                                        @if ($shipping->is_free == 1)
                                                            {{ currency($shipping->minimum_order) }} Up Condition
                                                        @else
                                                            {{ currency($shipping->fee) }}
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($shipping->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeProductTaxStatus({{ $shipping->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeProductTaxStatus({{ $shipping->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <div class="btn-group">
                                                            @adminCan('shipping.edit')
                                                                <a href="{{ route('admin.shipping.edit', $shipping->id) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('shipping.edit')
                                                                @if ($shipping->is_free != 1)
                                                                    <a href="javascript:;" data-bs-toggle="modal"
                                                                        data-bs-target="#deleteModal"
                                                                        class="btn btn-danger btn-sm"
                                                                        onclick="deleteData({{ $shipping->id }})"><i
                                                                            class="fa fa-trash" aria-hidden="true"></i></a>
                                                                @endif
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Shipping')" route='admin.shipping.create'
                                                    create="yes" :message="__('No data found!')" colspan="5">
                                                </x-empty-table>
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

    <script>
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/shipping/') }}' + "/" + id)
        }

        function changeProductTaxStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ route('admin.shipping.status', '') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response)
                },
                error: function(err) {
                    handleFetchError(err);

                }
            })
        }

        $('[name="search"]').on('change', function() {
            $('#product_search_form').submit();
        })
    </script>
@endsection
