@extends('admin.master_layout')
@section('title')
    <title>{{ __('Trainer List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Trainer List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Trainer List') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    {{-- Search filter --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="{{ route('admin.trainer.index') }}" method="GET" onchange="this.submit()">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-3 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-lg-3 form-group">
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
                                        <div class="col-md-4 col-lg-3 form-group">
                                            <select name="order_by" id="order_by" class="form-select">
                                                <option value="">{{ __('Order By') }}</option>
                                                <option value="1" {{ request('order_by') == '1' ? 'selected' : '' }}>
                                                    {{ __('ASC') }}
                                                </option>
                                                <option value="0" {{ request('order_by') == '0' ? 'selected' : '' }}>
                                                    {{ __('DESC') }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 col-lg-3 form-group">
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

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Trainer List') }}</h4>
                                <div>
                                    @adminCan('trainer.create')
                                        <a href="{{ route('admin.trainer.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th width="10%">{{ __('Image') }}</th>
                                                <th width="10%">{{ __('Trainer') }}</th>
                                                <th width="20%">{{ __('Joining Date') }}</th>
                                                <th width="10%">{{ __('Status') }}</th>
                                                <th width="20%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($trainers as $index => $trainer)
                                                <tr>
                                                    <td>{{ $trainers->firstItem() + $index }}</td>
                                                    <td class="py-1">
                                                        <figure class="avatar me-2 avatar-lg">
                                                            <img src="{{ asset($trainer->user?->image_url) }}"
                                                                alt="{{ $trainer?->user?->name }}">
                                                        </figure>
                                                    </td>
                                                    <td>{{ $trainer?->user?->name }}</td>
                                                    <td>{{ $trainer->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <input onchange="changeStatus({{ $trainer->id }})"
                                                            id="status_toggle" type="checkbox"
                                                            {{ $trainer->status ? 'checked' : '' }} data-toggle="toggle"
                                                            data-on="{{ __('Active') }}" data-off="{{ __('Inactive') }}"
                                                            data-onstyle="success" data-offstyle="danger">
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('trainer.edit')
                                                                <a href="{{ route('admin.trainer.edit', ['trainer' => $trainer->id]) }}"
                                                                    class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('trainer.view')
                                                                <a href="{{ route('admin.trainer.show', ['trainer' => $trainer->id]) }}"
                                                                    class="btn btn-info btn-sm me-2"><i
                                                                        class="fas fa-eye"></i></a>
                                                            @endadminCan
                                                            @adminCan('trainer.delete')
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal"
                                                                    class="btn btn-danger btn-sm me-2"
                                                                    onclick="deleteData({{ $trainer->id }})"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('trainer')"
                                                    route="{{ checkAdminHasPermission('trainer.create') ? 'admin.trainer.create' : '' }}"
                                                    create="yes" :message="__('No data found!')" colspan="7"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                @if (request()->get('par-page') !== 'all')
                                    <div class="float-right">
                                        {{ $trainers->onEachSide(3)->links() }}
                                    </div>
                                @endif
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
        "use strict"

        function deleteData(id) {
            $("#deleteForm").attr("action", '{{ route('admin.trainer.destroy', '') }}' + "/" + id)
        }
        "use strict"

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ url('/admin/trainer/status-update') }}" + "/" + id,
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
            });
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
