<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Wallet module</title>
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('global/toastr/toastr.min.css') }}">

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>

<body>

    <div class="container text-center">
        <h1 class="my-5">Wallet module</h1>


        @include('wallet::payment_basic')
        @include('wallet::payment_addon')















    </div>

    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>

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
