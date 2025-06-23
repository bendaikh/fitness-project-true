@extends('admin.master_layout')
@section('title')
    <title>{{ __('Coupon Histories') }}</title>
@endsection
@section('admin-content')
    <div class="main-content">
        <section class="section">

            <x-admin.breadcrumb title="{{ __('Coupon Histories') }}" :list="[
                __('Dashboard') => route('admin.dashboard'),
                __('Coupon Histories') => '#',
            ]" />

            <div class="section-body">
                <div class="row mt-sm-4">
                    <div class="col-12">
                        <div class="card ">
                            <div class="card-body">
                                <div class="table-responsive table-invoice">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>{{ __('SN') }}</th>
                                                <th>{{ __('Coupon Code') }}</th>
                                                <th>{{ __('Discount Amount') }}</th>
                                                <th>{{ __('Date') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($coupon_histories as $index => $coupon_history)
                                                <tr>
                                                    <td>{{ $coupon_histories->firstItem() + $index }}</td>
                                                    <td>{{ $coupon_history->coupon_code }}</td>
                                                    <td>

                                                        {{ currency($coupon_history->discount_amount) }}

                                                    </td>
                                                    <td>{{ date('H:iA, d M Y', strtotime($coupon_history->created_at)) }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <x-empty-table :name="__('Coupon')" route="admin.coupon.index" create="no"
                                                    :message="__('No data found!')" colspan="7"></x-empty-table>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $coupon_histories->onEachSide(3)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
