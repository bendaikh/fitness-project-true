    @if ($razorpay_credentials->razorpay_status == 'active')
        <a href="javascript:;" class="btn btn-primary" id="razorpayBtn">
            Pay with razorpay
        </a>

        <form action="{{ route('subscription.pay-via-razorpay', $plan->id) }}" method="POST" class="d-none">
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


    @if ($mollie_credentials->mollie_status == 'active')
        <a href="{{ route('subscription.pay-via-mollie', $plan->id) }}" class="btn btn-primary">
            Pay with Mollie
        </a>
    @endif

    @if ($instamojo_credentials->instamojo_status == 'active')
        <a href="{{ route('subscription.pay-via-instamojo', $plan->id) }}" class="btn btn-primary">
            Pay with instamojo
        </a>
    @endif

    @if ($flutterwave_credentials->flutterwave_status == 'active')
        <a onclick="flutterwavePayment()" href="javascript:;" class="btn btn-primary">
            Pay with flutterwave
        </a>
    @endif

    @if ($payment_setting->paystack_status == 'active')
        <a onclick="payWithPaystack()" href="javascript:;" class="btn btn-primary my-2">
            Pay with paystack
        </a>
    @endif




    @push('payment-script')
        <script>
            "use strict";
            $(function() {
                $("#razorpayBtn").on("click", function() {
                    $(".razorpay-payment-button").click();
                })
            });
        </script>

        {{-- start flutterwave payment --}}
        <script src="https://checkout.flutterwave.com/v3.js"></script>

        <script>
            "use strict";

            function flutterwavePayment() {
                FlutterwaveCheckout({
                    public_key: "{{ $flutterwave_credentials->flutterwave_public_key }}",
                    tx_ref: "{{ substr(rand(0, time()), 0, 10) }}",
                    amount: "{{ $flutterwave_credentials->payable_with_charge }}",
                    currency: "{{ $flutterwave_credentials->currency_code }}",
                    country: "{{ $flutterwave_credentials->country_code }}",
                    payment_options: " ",
                    customer: {
                        email: "{{ $user->email }}",
                        phone_number: "{{ $user->phone }}",
                        name: "{{ $user->name }}",
                    },
                    callback: function(data) {

                        var tnx_id = data.transaction_id;
                        var _token = "{{ csrf_token() }}";
                        var payable_amount = "{{ $payable_amount }}";
                        var secret_key = "{{ $flutterwave_credentials->flutterwave_secret_key }}";

                        $.ajax({
                            type: 'post',
                            data: {
                                tnx_id,
                                _token,
                                payable_amount,
                                secret_key
                            },
                            url: "{{ url('paymentgateway/pay-via-flutterwave') }}",
                            success: function(response) {
                                window.location.href =
                                    "{{ route('subscription.payment-addon-success') }}";
                            },
                            error: function(err) {
                                toastr.error("{{ __('Payment faild, please try again') }}");
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

        {{-- paystack start --}}

        <script src="https://js.paystack.co/v1/inline.js"></script>

        <script>
            "use strict";

            function payWithPaystack() {
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
                            type: "get",
                            data: {
                                reference,
                                tnx_id,
                                _token,
                                payable_amount,
                                secret_key
                            },
                            url: "{{ url('paymentgateway/pay-via-paystack') }}",
                            success: function(response) {
                                window.location.href =
                                    "{{ route('subscription.payment-addon-success') }}";
                            },
                            error: function(response) {
                                toastr.error("{{ __('Payment faild, please try again') }}");
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
    @endpush
