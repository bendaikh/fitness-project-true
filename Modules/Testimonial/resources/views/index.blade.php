@extends('admin.master_layout')
@section('title')
    <title>{{ __('Testimonial List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Testimonial List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Testimonial List') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Testimonial List') }}</h4>
                                <div>
                                    @adminCan('testimonial.create')
                                        <a href="{{ route('admin.testimonial.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i>
                                            {{ __('Add New') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Name') }}</th>
                                                <th>{{ __('Designation') }}</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($testimonials as $testimonial)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ $testimonial->name }}</td>
                                                    <td>{{ $testimonial->designation }}</td>
                                                    <td><img src="{{ asset($testimonial->image) }}" alt=""
                                                            class="rounded-circle">
                                                    </td>
                                                    <td>
                                                        <input onchange="changeStatus({{ $testimonial->id }})"
                                                            id="status_toggle" type="checkbox"
                                                            {{ $testimonial->status ? 'checked' : '' }}
                                                            data-toggle="toggle" data-on="{{ __('Active') }}"
                                                            data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                            data-offstyle="danger">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <a href="{{ route('admin.testimonial.edit', ['testimonial' => $testimonial->id, 'code' => getSessionLanguage()]) }}"
                                                                class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                    aria-hidden="true"></i></a>
                                                            <a href="javascript:;" data-bs-toggle="modal"
                                                                data-bs-target="#deleteModal"
                                                                class="btn btn-danger btn-sm me-2"
                                                                onclick="deleteData({{ $testimonial->id }})"><i
                                                                    class="fa fa-trash" aria-hidden="true"></i></a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Testimonial')" route="admin.testimonial.create"
                                                    create="yes" :message="__('No data found!')" colspan="6">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $testimonials->onEachSide(3)->links() }}
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
        "use strict";

        function deleteData(id) {
            $("#deleteForm").attr("action", "{{ url('/admin/testimonial/') }}" + "/" + id)
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ url('/admin/testimonial/status-update') }}" + "/" + id,
                success: function(response) {
                    if (response.success) {
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

@push('css')
    <style>
        .dd-custom-css {
            position: absolute;
            will-change: transform;
            top: 0px;
            left: 0px;
            transform: translate3d(0px, -131px, 0px);
        }

        .max-h-400 {
            min-height: 400px;
        }
    </style>
@endpush
