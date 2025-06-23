@php
    $method = $paymentMethod;
    $flutterwave_app_name = $paymentService->getGatewayDetails($method)->flutterwave_app_name ?? '';
    $flutterwave_image = $paymentService->getGatewayDetails($method)->flutterwave_image ?? '';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Flutterwave Checkout</title>
</head>

<body>
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    <script src="https://checkout.flutterwave.com/v3.js"></script>

    <script>
        "use strict";
        (function($) {
            "use strict";
            $(document).ready(function() {
                flutterwavePayment();
            });
        })(jQuery);

        function flutterwavePayment() {
            FlutterwaveCheckout({
                public_key: "{{ $paymentService->getGatewayDetails($method)->flutterwave_public_key }}",
                tx_ref: "{{ substr(rand(0, time()), 0, 10) }}",
                amount: "{{ session('paid_amount') }}",
                currency: "{{ session('payable_currency') }}",
                country: "{{ session('country_code') }}",
                payment_options: " ",
                customer: {
                    email: "{{ userAuth()?->email }}",
                    phone_number: "{{ userAuth()?->phone }}",
                    name: "{{ userAuth()?->name }}",
                },
                callback: function(data) {
                    var tnx_id = data.transaction_id;
                    var _token = "{{ csrf_token() }}";
                    var payable_amount = "{{ session('paid_amount') }}";
                    $.ajax({
                        type: 'post',
                        data: {
                            tnx_id,
                            _token,
                            payable_amount,
                        },
                        url: "{{ route('pay-via-flutterwave') }}",
                        success: function(response) {
                            window.location.href = "{{ route('payment-success') }}";
                        },
                        error: function(err) {
                            window.location.href = "{{ route('payment-failed') }}";
                        }
                    });
                },
                customizations: {
                    title: "{{ $flutterwave_app_name }}",
                    logo: "{{ asset($flutterwave_image) }}",
                },
            });

        }
    </script>
</body>

</html>
