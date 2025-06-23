@extends('website.layout.master')


@section('title')
    {{ seoSetting()->where('page_name', 'Payment Page')->first()->seo_title ?? '' }}
@endsection

@section('content')
    {{-- <!--============================
        BREADCRUMBS START
    =============================--> --}}
    @include('components.website.breadcrum', ['title' => __('Payment')])
    {{-- <!--============================
        BREADCRUMBS END
    =============================--> --}}

    {{-- <!--============================
        PAYMENT START
    =============================--> --}}
    <section class="wsus__payment mt_120 xs_mt_100 pb_120 xs_pb_100">
        <div class="container">
            <div class="wsus__payment_area">
                <div class="row">

                    <div class="col-lg-6 col-xl-8 wow fadeInUp">
                        <h4>{{ __('Select Payment') }}</h4>

                        <div class="row">
                            @foreach ($activeGateways as $gatewayKey => $gatewayDetails)
                                <div class="col-sm-6 col-md-4 col-lg-6 col-xl-3 wow fadeInUp">
                                    <a href="javascript:;" class="wsus__payment_method place-order-btn"
                                        data-method="{{ $gatewayKey }}">
                                        <img src="{{ asset($gatewayDetails['logo']) }}" alt="{{ $gatewayDetails['name'] }}"
                                            class="img-fluid w-100">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp">
                        @if (session('payment_for') != 'plan')
                            @include('components.billing-info', ['cart_contents' => $cart_contents])
                        @else
                            @include('components.plan-billing', [
                                'plan' => $cart_contents['plan'],
                                'type' => $cart_contents['plan_type'],
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!--============================
        PAYMENT END
    =============================--> --}}
    @include('components.preloader')
@endsection
@push('scripts')
    <script src="{{ asset('website/js/default/payment.js') }}"></script>
@endpush
