@if ($razorpay_credentials->razorpay_status == 'active')
    <form action="{{ route('pay-via-razorpay') }}" method="POST" class="d-none razorpay-payment-button">
        @csrf

        <input type="hidden" name="payable_amount" value="{{ $payable_amount }}">

        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $razorpay_credentials->razorpay_key }}"
            data-currency="{{ $razorpay_credentials->currency_code }}"
            data-amount="{{ $razorpay_credentials->payable_with_charge * 100 }}" data-buttontext="{{ __('Pay') }}"
            data-name="{{ $razorpay_credentials->razorpay_name }}"
            data-description="{{ $razorpay_credentials->razorpay_description }}"
            data-image="{{ asset($razorpay_credentials->razorpay_image) }}" data-prefill.name="" data-prefill.email=""
            data-theme.color="{{ $razorpay_credentials->razorpay_theme_color }}"></script>
    </form>
@endif

@push('scripts')
    <script>
        "use strict";
        $("#razorpayBtn").on("click", function() {
            console.log('clicked');
            $(".razorpay-payment-button").trigger('submit');
        })
    </script>

    @if ($flutterwave_credentials->flutterwave_status == 'active')
        {{-- start flutterwave payment --}}
        <script src="https://checkout.flutterwave.com/v3.js"></script>

        <script>
            "use strict";

            function flutterwavePayment() {

                var isCurrencyAllowed =
                    "{{ $PaymentGatewaySupportedCurrenyListEnum::isFlutterwaveSupportedCurrencies($flutterwave_credentials->currency_code) ? '1' : '0' }}";

                if (isCurrencyAllowed == 0) {
                    toastr.error('This currency is not supported by Flutterwave');
                    $('#show_currency_notifications').empty();
                    $('#show_currency_notifications').append(
                        `<div class='alert alert-warning'>
                        Flutterwave {{ __('Support only those type of currencies') }} :
                        {{ is_array($PaymentGatewaySupportedCurrenyListEnum::getFlutterwaveSupportedCurrencies())
                            ? implode(', ', array_keys($PaymentGatewaySupportedCurrenyListEnum::getFlutterwaveSupportedCurrencies()))
                            : '' }}
                    </div>`
                    );
                    return;
                }

                FlutterwaveCheckout({
                    public_key: "{{ $flutterwave_credentials->flutterwave_public_key }}",
                    tx_ref: "{{ substr(rand(0, time()), 0, 10) }}",
                    amount: "{{ $flutterwave_credentials->payable_with_charge }}",
                    currency: "{{ $flutterwave_credentials->currency_code }}",
                    country: "{{ $flutterwave_credentials->country_code }}",
                    payment_options: " card, ussd, bank transfer, mobilemoneyghana, mobilemoneyzambia, mobilemoneyrwanda, mobilemoney uganda",

                    customer: {
                        email: "{{ $user->email }}",
                        phone_number: "{{ $user->phone }}",
                        name: "{{ $user->name }}",
                    },
                    callback: function(data) {
                        console.log(data);
                        var tnx_id = data.transaction_id;
                        var _token = "{{ csrf_token() }}";
                        var payable_amount = "{{ $payable_amount }}";
                        $.ajax({
                            type: 'post',
                            data: {
                                tnx_id,
                                _token,
                                payable_amount,
                            },
                            url: "{{ route('website.pay.flutterwave.payment') }}",
                            success: function(response) {
                                window.location.href =
                                    "{{ route('payment-addon-success') }}";
                            },
                            error: function(err) {
                                toastr.error("{{ __('Payment failed, please try again') }}");
                                window.location.reload();
                            }
                        });
                    },
                    customizations: {
                        title: "{{ $flutterwave_credentials->flutterwave_app_name }}",
                        logo: "{{ asset($flutterwave_credentials->flutterwave_image) }}",
                    },
                });

            }
        </script>
        {{-- end flutterwave payment --}}
    @endif

    @if ($payment_setting->paystack_status == 'active')
        {{-- paystack start --}}

        <script src="https://js.paystack.co/v1/inline.js"></script>

        <script>
            "use strict";

            function payWithPaystack() {
                var isCurrencyAllowed =
                    "{{ $PaymentGatewaySupportedCurrenyListEnum::isPaystackSupportedCurrencies($paystack_credentials->currency_code) ? '1' : '0' }}";



                var handler = PaystackPop.setup({
                    key: '{{ $paystack_credentials->paystack_public_key }}',
                    email: '{{ $user->email }}',
                    amount: '{{ $paystack_credentials->payable_with_charge * 100 }}',
                    currency: "{{ $paystack_credentials->currency_code }}",
                    callback: function(response) {
                        let reference = response.reference;
                        let tnx_id = response.transaction;
                        let _token = "{{ csrf_token() }}";
                        var payable_amount = "{{ $payable_amount }}";
                        var secret_key = "{{ $paystack_credentials->paystack_secret_key }}";

                        $.ajax({
                            type: "post",
                            data: {
                                reference,
                                tnx_id,
                                _token,
                                payable_amount,
                                secret_key,
                            },
                            url: "{{ route('website.paystack-payment') }}",
                            success: function(response) {
                                window.location.href =
                                    "{{ route('payment-addon-success') }}";
                            },
                            error: function(response) {
                                toastr.error("{{ __('Payment failed, please try again') }}");
                                window.location.reload();
                            }
                        });
                    },
                    onClose: function() {
                        alert('window closed');
                    }
                });
                handler.openIframe();
            }
        </script>
    @endif
@endpush
