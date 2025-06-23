<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Subscription Plan Module</title>
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">

    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">

</head>

<body>

    <div class="container text-center">
        <h1 class="my-5">Subscription Plan Module</h1>


        <div class="row">
            <div class="col-md-8">
                @include('subscription::payment_basic')

                @include('subscription::payment_addon')

            </div>
            <div class="col-md-4">
                <div class="card w-18rem">
                    <div class="card-header">
                        {{ $plan->plan_name }}
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Price : {{ currency($plan->plan_price) }}</li>
                        <li class="list-group-item">Expiration : {{ $plan->expiration_date }}</li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
    <script src="{{ asset('website/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('global/toastr/toastr.min.js') }}"></script>


    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message') }}");
                    break;
                case 'success':
                    toastr.success("{{ Session::get('message') }}");
                    break;
                case 'warning':
                    toastr.warning("{{ Session::get('message') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('message') }}");
                    break;
            }
        @endif
    </script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
    @endif

    @stack('payment-script')

</body>

</html>
