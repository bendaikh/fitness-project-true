@extends('admin.master_layout')
@section('title')
    <title>{{ __('Partner List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>{{ __('Partner List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Partner List') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Partner List')" />
                                @adminCan('partner.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.partner.create')" text="{{ __('Add Partner') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('Link') }}</th>
                                                <th>{{ __('Logo') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($partners as $index => $partner)
                                                <tr>

                                                    <td><a href="{{ $partner->link }}">{{ __('Link') }}</a></td>

                                                    <td> <img class="w_80" src="{{ asset($partner->logo) }}"
                                                            alt="" width="50px"></td>
                                                    <td>
                                                        @if ($partner->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeProductBrandStatus({{ $partner->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeProductBrandStatus({{ $partner->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.partner.edit', $partner->id) }}"
                                                                class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal" class="btn btn-danger btn-sm"
                                                                onclick="deleteData({{ $partner->id }})"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </div>

                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Partner')" route='admin.partner.create' create="yes"
                                                    :message="__('No data found!')" colspan="4">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </div>

    <script>
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/partner/') }}' + "/" + id)
        }

        function changeProductBrandStatus(id) {

            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ url('/admin/partner-status/') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response)
                },
                error: function(err) {

                    handleFetchError(err);
                }
            })
        }
    </script>
@endsection
