@extends('admin.master_layout')
@section('title')
    <title>{{ __('Dashboard') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __('Dashboard') }}</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    @if (isShopActive())
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ __('Total Orders') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $totalOrders }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Total Customers') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalCustomers }}
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (isShopActive())
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="far fa-paper-plane"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ __('Total Orders(30 Days)') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ $last30DaysOrders }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-running fa-size-2rem"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Total Enrollments') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalEnrollments }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Active Subscriptions') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $activeSubscriptions }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Award') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $awards }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Services') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $services }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Trainers') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $trainers }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Subscription Income') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ currency($data['subscriptionIncome']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @if (isShopActive())
                        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="card card-statistic-1">
                                <div class="card-icon bg-info">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <div class="card-wrap">
                                    <div class="card-header">
                                        <h4>{{ __('Product Order Income') }}</h4>
                                    </div>
                                    <div class="card-body">
                                        {{ currency($data['orderIncome']) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Enrollment Income') }}</h4>
                                </div>
                                <div class="card-body">
                                    {{ currency($data['enrollmentIncome']) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{ __('Total Income') }}</h4>
                                </div>
                                <div class="card-body">
                                    @php
                                        $income = $data['enrollmentIncome'] + $data['subscriptionIncome'];

                                        if (isShopActive()) {
                                            $income += $data['orderIncome'];
                                        }
                                    @endphp
                                    {{ currency($income) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    @if (isShopActive())
                        @adminCan('order.view')
                            <div class="col-lg-6 col-md-12 col-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>{{ __('Recent Orders') }}</h4>
                                        <div class="card-header-action">
                                            <a href="{{ route('admin.orders') }}"
                                                class="btn btn-primary">{{ __('View All') }}</a>
                                        </div>
                                    </div>

                                    <div class="p-0 card-body">
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>{{ __('User') }}</th>
                                                        <th>{{ __('Delivery Method') }}</th>
                                                        <th>{{ __('Price') }}</th>
                                                        <th>{{ __('Payment') }}</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($data['recentOrders'] as $history)
                                                        <tr>
                                                            <td><a
                                                                    href="{{ route('admin.order.show', $history->id) }}">{{ $history?->user?->name ?? 'Guest' }}</a>
                                                            </td>
                                                            <td>
                                                                <div class="badge bg-info">
                                                                    {{ $history->delivery_method == 1 ? __('Delivery') : __('Pickup') }}
                                                                </div>
                                                            </td>
                                                            <td>{{ currency($history->total_amount) }}</td>
                                                            <td>
                                                                @if ($history->payment_status == 'pending')
                                                                    <div class="badge bg-warning">
                                                                        {{ __('Pending') }}
                                                                    </div>
                                                                @elseif ($history->payment_status == 'success')
                                                                    <div class="badge bg-success">
                                                                        {{ __('Success') }}
                                                                    </div>
                                                                @else
                                                                    <div class="badge bg-danger">
                                                                        {{ __('Rejected') }}
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <tr>
                                                            <td colspan="4">{{ __('No data found') }}</td>
                                                        </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endadminCan
                    @endif
                    @adminCan('customer.view')
                        <div class="{{ isShopActive() ? 'col-lg-6' : 'col-lg-12' }} col-md-12 col-12 col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>{{ __('Recent User') }}</h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('admin.all-customers') }}"
                                            class="btn btn-primary">{{ __('View All') }}</a>
                                    </div>
                                </div>
                                <div class="p-0 card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('Name') }}</th>
                                                    <th>{{ __('Joined at') }}</th>
                                                    <th>{{ __('Status') }}</th>
                                                    <th>{{ __('Action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data['latestCustomers'] as $user)
                                                    <tr>
                                                        <td>{{ html_decode($user->name) }}</td>
                                                        <td>{{ $user->created_at->format('h:iA, d M Y') }}</td>
                                                        <td>
                                                            @if ($user->email_verified_at)
                                                                @if ($user->is_banned == 'no')
                                                                    <span class="badge bg-success">{{ __('Active') }}</span>
                                                                @else
                                                                    <b class="badge bg-danger">{{ __('Banned') }}</b>
                                                                @endif
                                                            @else
                                                                <span class="badge bg-warning">{{ __('Not verified') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('admin.customer-show', $user->id) }}"
                                                                class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4">{{ __('No data found') }}</td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endadminCan
                </div>
            </div>
        </section>
    </div>
@endsection
