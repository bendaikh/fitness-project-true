<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>403 &mdash; {{ $setting->app_name }}</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/fontawesome/css/all.min.css') }}">

    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/components.css') }}">
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="page-error">
                    <div class="page-inner">
                        <h1>403</h1>
                        <div class="page-description">
                            You do not have access to this page.
                        </div>
                        <div class="page-search">
                            <div class="mt-3">
                                <a href="{{ route('admin.dashboard') }}">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="simple-footer mt-5">
                    Copyright &copy; {{ $setting->app_name }} {{ date('Y') }}
                </div>
            </div>
        </section>
    </div>

</body>

</html>
