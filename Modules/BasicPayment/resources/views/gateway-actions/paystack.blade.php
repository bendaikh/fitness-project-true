@php
    $method = $paymentMethod;
    $paystack_public_key = $paymentService->getGatewayDetails($method)->paystack_public_key ?? '';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paystack Checkout</title>
</head>

<body>
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>
    {{-- paystack start --}}
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script>
        "use strict";
        (function($) {
            $(document).ready(function() {
                payWithPaystack();
            });

        })(jQuery);

        function payWithPaystack() {
            var handler = PaystackPop.setup({
                key: '{{ $paystack_public_key }}',
                email: '{{ userAuth()?->email }}',
                amount: "{{ session('paid_amount') * 100 }}",
                currency: "{{ session('payable_currency') }}",
                callback: function(response) {
                    let reference = response.reference;
                    let tnx_id = response.transaction;
                    let _token = "{{ csrf_token() }}";
                    var payable_amount = "{{ session('paid_amount') }}";

                    $.ajax({
                        type: "get",
                        data: {
                            reference,
                            tnx_id,
                            _token,
                            payable_amount
                        },
                        url: "{{ route('pay-via-paystack') }}",
                        success: function(response) {
                            window.location.href = "{{ route('payment-success') }}";
                        },
                        error: function(response) {
                            window.location.href = "{{ route('payment-failed') }}";
                        }
                    });
                },
                onClose: function() {
                    window.location.href = "{{ route('payment-failed') }}";
                }
            });
            handler.openIframe();
        }
    </script>
</body>

</html>
