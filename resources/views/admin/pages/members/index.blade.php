@extends('admin.master_layout')
@section('title')
    <title>{{ __('Member List') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Member List') }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __('Member List') }}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="mt-4 row">
                    {{-- Search filter --}}
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body pb-0">

                                <form action="{{ route('admin.members.index') }}" method="GET" onchange="this.submit()">
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

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>{{ __('Member List') }}</h4>
                                <div>
                                    @adminCan('member.create')
                                        <a href="{{ route('admin.members.create') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> {{ __('Add New') }}</a>
                                    @endadminCan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive max-h-400">
                                    <table class="table member_table">
                                        <thead>
                                            <tr>
                                                <th width="5%">{{ __('SN') }}</th>
                                                <th width="10%">{{ __('Image') }}</th>
                                                <th class="min_width" width="15%">{{ __('Member ID') }}</th>
                                                <th class="min_width" width="20%">{{ __('Member') }}</th>
                                                <th class="min_width" width="10%">{{ __('Plan Name') }}</th>
                                                <th class="min_width" width="10%">{{ __('Joining Date') }}</th>
                                                <th class="min_width" width="10%">{{ __('Expire Date') }}</th>
                                                <th width="10%">{{ __('Status') }}</th>
                                                <th width="10%">{{ __('Action') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($members as $index => $member)
                                                <tr class="text-start">
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td class="py-1">
                                                        <figure class="avatar me-2 avatar-lg">
                                                            <img src="{{ $member->user->imageUrl }}" alt="">
                                                        </figure>
                                                    </td>
                                                    <td class="min_width">
                                                        {{ $member->member_id }}
                                                    </td>

                                                    <td class="min_width">{{ $member?->user?->name }}</td>
                                                    @if ($member?->subscription?->id != null)
                                                        <td>{{ $member?->plan?->plan_name ?: 'Trial' }}</td>
                                                    @else
                                                        <td>{{ __('N/A') }}</td>
                                                    @endif
                                                    <td class="min_width">
                                                        {{ $member?->startDate? now()->parse($member?->startDate)->format('d M, Y'): 'N/A' }}
                                                    </td>
                                                    @if ($member->expiredDate != null)
                                                        @php
                                                            // Current date
                                                            $nowDate = new DateTime();

                                                            // End date from $member object
                                                            $expireDate = new DateTime($member->expiredDate);

                                                            // Calculate the difference between two dates
                                                            $diff = $nowDate->diff($expireDate);

                                                            // Get the difference in days
                                                            $diffInDays = $diff->days;

                                                        @endphp
                                                        <td class="min_width">{!! $diffInDays
                                                            ? now()->parse($member->expiredDate)->format('d M, Y')
                                                            : '<span class="text-danger">Expired</span>' !!}
                                                        </td>
                                                    @else
                                                        <td class="min_width">{{ __('N/A') }}</td>
                                                    @endif

                                                    <td class="min_width">
                                                        @adminCan('member.update')
                                                            <input onchange="changeStatus({{ $member->id }})"
                                                                id="status_toggle" type="checkbox"
                                                                {{ $member->status ? 'checked' : '' }} data-toggle="toggle"
                                                                data-on="{{ __('Active') }}" data-off="{{ __('Inactive') }}"
                                                                data-onstyle="success" data-offstyle="danger">
                                                        @endadminCan
                                                    </td>
                                                    <td>
                                                        <div class="btn-group">
                                                            @adminCan('member.edit')
                                                                <a href="{{ route('admin.members.edit', ['member' => $member->id, 'code' => getSessionLanguage()]) }}"
                                                                    class="btn btn-warning btn-sm me-2"><i class="fa fa-edit"
                                                                        aria-hidden="true"></i></a>
                                                            @endadminCan
                                                            @adminCan('member.view')
                                                                <a href="{{ route('admin.members.show', ['member' => $member->id]) }}"
                                                                    class="btn btn-info btn-sm  me-2"><i
                                                                        class="fas fa-eye"></i></a>
                                                            @endadminCan
                                                            @adminCan('member.delete')
                                                                <a href="javascript:;" data-bs-toggle="modal"
                                                                    data-bs-target="#deleteModal"
                                                                    class="btn btn-danger btn-sm"
                                                                    onclick="deleteData({{ $member->id }})"><i
                                                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                                            @endadminCan
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('member')" route="admin.members.create"
                                                    create="yes" :message="__('No data found!')" colspan="9"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                @if (request()->get('par-page') !== 'all')
                                    <div class="float-right">
                                        {{ $members->onEachSide(3)->links() }}
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
            $("#deleteForm").attr("action", '{{ route('admin.members.destroy', '') }}' + "/" + id)
        }
        "use strict"

        function changeStatus(id) {
            $.ajax({
                type: "put",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                url: "{{ route('admin.member.status', '') }}" + "/" + id,
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
