@extends('website.user.layout.layout')

@section('title', 'Subscriptions')

@section('user-content')
    <div class="wsus__dashboard_main_contant wow fadeInUp">
        <h4>{{ __('Subscription') }}</h4>
        <div class="wsus__dashboard_order">
            <div class="row">
                @if ($subscriptionHistories?->count() > 0)
                    <div class="col-12 wow fadeInUp">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="serial">{{ __('Serial') }}</th>
                                        <th class="package">{{ __('Package') }}</th>
                                        <th class="p_date">{{ __('Purchase Date') }}</th>
                                        <th class="e_date">{{ __('Expired Date') }}</th>
                                        <th class="price">{{ __('Price') }}</th>
                                        <th class="action">{{ __('Action') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscriptionHistories as $index => $history)
                                        <tr>
                                            <td class="serial">{{ $subscriptionHistories->firstItem() + $index }}
                                            </td>
                                            <td class="package">{{ $history->plan_name }}</td>
                                            <td class="p_date">{{ now()->parse($history->start_date)->format('d-m-Y') }}
                                            </td>
                                            <td class="e_date">{{ now()->parse($history->end_date)->format('d-m-Y') }}</td>
                                            <td class="price">{{ currency($history->total_amount) }}</td>
                                            <td class="action">
                                                <a href="{{ route('website.user.subscription.details', $history->id) }}">
                                                    <i class="far fa-eye" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    @include('components.no-data-found', [
                        'message' => __('No Subscription Found'),
                    ])
                @endif
            </div>
            @if ($subscriptionHistories?->lastPage() > 1)
                <div class="row">
                    <div class="col-12 wow fadeInUp vis-animation">
                        <div class="wsus__pagination mt_60">
                            {{ $subscriptionHistories->links('vendor.pagination.frontend') }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
