@extends('admin.master_layout')
@section('title')
    <title>{{ __('Call To Action List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Call To Action List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Call To Action List') }}</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Call To Action List')" />
                                <div>
                                    @if ($counters->count() < 4)
                                        <x-admin.add-button :href="route('admin.call-to-action.create')" text="{{ __('Add Call To Action') }}" />
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Icon') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($counters as $index => $counter)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>{{ $counter->title }}</td>
                                                    <td>
                                                        <img src="{{ asset($counter->icon) }}" alt=""
                                                            class="w_80">
                                                    </td>
                                                    <td>
                                                        @if ($counter->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeServiceStatus({{ $counter->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeServiceStatus({{ $counter->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('InActive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.call-to-action.edit', $counter->id) }}?code={{ getSessionLanguage() }}"
                                                                class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>

                                                            <a href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal" class="btn btn-danger btn-sm"
                                                                onclick="deleteData({{ $counter->id }})"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </div>
                                                    </td>
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
        </section>
    </div>

    <script>
        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ url('admin/call-to-action/') }}' + "/" + id)
        }

        function changeServiceStatus(id) {

            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ url('/admin/call-to-action-status/') }}" + "/" + id,
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
