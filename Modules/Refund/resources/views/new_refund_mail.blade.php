<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    {!! $mail_template !!}

    <a href="{{ route('admin.show-refund-request', $refund_request->id) }}">{{ route('admin.show-refund-request', $refund_request->id) }}</a>
</body>
</html>
