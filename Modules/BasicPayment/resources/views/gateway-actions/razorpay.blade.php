@php
    $method = $paymentMethod;
    $razorpay_key = $paymentService->getGatewayDetails($method)->razorpay_key ?? '';
    $razorpay_name = $paymentService->getGatewayDetails($method)->razorpay_name ?? '';
    $razorpay_description = $paymentService->getGatewayDetails($method)->razorpay_description ?? '';
    $razorpay_image = $paymentService->getGatewayDetails($method)->razorpay_image ?? '';
    $razorpay_theme_color = $paymentService->getGatewayDetails($method)->razorpay_theme_color ?? '';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Razorpay Checkout</title>
    <style>
        .razorpay-payment-button {
            display: none;
        }
    </style>
</head>

<body>
    <form action="{{ route('pay-via-razorpay') }}" method="POST" class="d-none">
        @csrf
        <input type="hidden" name="payable_amount" value="{{ session('paid_amount') }}">
        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ $razorpay_key }}"
            data-currency="{{ session('payable_currency') }}" data-amount="{{ session('paid_amount') * 100 }}"
            data-buttontext="" data-name="{{ $razorpay_name }}" data-description="{{ $razorpay_description }}"
            data-image="{{ asset($razorpay_image) }}" data-prefill.name="{{ userAuth()?->name }}"
            data-prefill.email="{{ userAuth()?->email }}" data-theme.color="{{ $razorpay_theme_color }}"></script>
    </form>
    <script>
        "use strict";
        document.addEventListener('DOMContentLoaded', function() {
            var razorpayButton = document.querySelector('.razorpay-payment-button');
            if (razorpayButton) {
                razorpayButton.click();
            }
        });
    </script>
</body>

</html>
