@php
    $method = $paymentService::BANK_PAYMENT;
    $bank_information = $paymentService->getGatewayDetails($method)->bank_information ?? '';
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank Checkout</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($setting->favicon) }}">
    <link rel="stylesheet" href="{{ asset('global/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('website/css/style.css') }}?v={{ $setting?->version }}">
</head>

<body>
    <section class="about-area-three section-py-120 vh-100 d-flex align-items-center justify-content-center">
        <div class="container d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card singUp-wrap">
                    <div class="card-header bg-transparent">
                        {!! nl2br($bank_information) !!}
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pay-via-bank') }}" method="post">
                            @csrf
                            <!-- Bank Name -->
                            <div class="my-1 form-group">
                                <label for="bank_name">{{ __('Bank Name') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="bank_name" name="bank_name"
                                    placeholder="{{ __('Your bank name') }}" required>
                            </div>

                            <!-- Account Number -->
                            <div class="my-1 form-group">
                                <label for="account_number">{{ __('Account Number') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="account_number" name="account_number"
                                    placeholder="{{ __('Your bank account number') }}" required>
                            </div>

                            <!-- Routing Number -->
                            <div class="my-1 form-group">
                                <label for="routing_number">{{ __('Routing Number') }}</label>
                                <input type="text" class="form-control" id="routing_number" name="routing_number"
                                    placeholder="{{ __('Your bank routing number') }}">
                            </div>

                            <!-- Branch -->
                            <div class="my-1 form-group">
                                <label for="branch">{{ __('Branch') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="branch" name="branch"
                                    placeholder="{{ __('Your bank branch name') }}" required>
                            </div>

                            <button class="mt-2 common_btn common_btn_2">{{ __('Submit') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
