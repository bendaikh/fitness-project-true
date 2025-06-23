@extends('admin.master_layout')
@section('title')
    <title>{{ __('Award List') }}</title>
@endsection
@section('admin-content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <x-admin.breadcrumb title="{{ __('Award List') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Award List') => '#',
            ]" />

            <div class="section-body">

                <div class="row mt-4">
                    {{-- Search filter --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">
                                <form action="" method="GET" onchange="this.submit()">
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <div class="search_wrapper">
                                                <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                                    class="form-control" placeholder="{{ __('Search') }}">
                                                <button class="search_button" type="submit">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="col-md-4 form-group">
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
                                        <div class="col-md-4 form-group">
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
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <x-admin.form-title :text="__('Award List')" />
                                @adminCan('award.create')
                                    <div>
                                        <x-admin.add-button :href="route('admin.award.create')" text="{{ __('Add Award') }}" />
                                    </div>
                                @endadminCan
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table" id="dataTable">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Image') }}</th>
                                                <th>{{ __('Title') }}</th>
                                                <th>{{ __('Status') }}</th>
                                                <th>{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($awards as $index => $award)
                                                <tr>
                                                    <td>{{ $awards->firstItem() + $index }}</td>
                                                    <td>
                                                        <img alt="image" src="{{ asset($award->image_url) }}"
                                                            class="rounded-circle" width="35">
                                                    </td>
                                                    <td>{{ $award->name }}</td>

                                                    <td>
                                                        @if ($award->status == 1)
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $award->id }})">
                                                                <input id="status_toggle" type="checkbox" checked
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @else
                                                            <a href="javascript:;"
                                                                onclick="changeStatus({{ $award->id }})">
                                                                <input id="status_toggle" type="checkbox"
                                                                    data-toggle="toggle" data-on="{{ __('Active') }}"
                                                                    data-off="{{ __('Inactive') }}" data-onstyle="success"
                                                                    data-offstyle="danger">
                                                            </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('award.edit')
                                                                <a href="{{ route('admin.award.edit', $award->id) }}"
                                                                    class="btn btn-primary btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('award.delete')
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal" class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $award->id }})"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Award')" route='admin.award.create' create="yes"
                                                    :message="__('No data found!')" colspan="5">
                                                </x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $awards->onEachSide(3)->links() }}
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
            $("#deleteForm").attr("action", '{{ url('admin/award/') }}' + "/" + id)
        }

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}'
                },
                url: "{{ route('admin.award.status', '') }}" + "/" + id,
                success: function(response) {
                    toastr.success(response)
                },
                error: function(error) {
                    handleFetchError(error);
                }
            })
        }
    </script>
@endsection
