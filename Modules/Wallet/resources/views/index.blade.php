<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">

    <title>Wallet Module</title>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Wallet Module</h1>

        <div class="card text-start">
            <div class="card-body">
                <h4 class="card-title">Deposit form</h4>

                <form action="{{ route('wallet.wallet.create') }}">
                    <div class="form-group">
                        <label for="">Deposit Amount</label>
                        <input type="text" class="form-control" name="amount" autocomplete="off">
                    </div>

                    <button class="btn btn-primary">{{ __('Submit') }}</button>
                </form>
            </div>
        </div>


        <h1>Wallet Balance : {{ currency($wallet_histories->where('payment_status', 'success')->sum('amount')) }}</h1>

        <table class="table">
            <thead>
                <th>{{ __('SN') }}</th>
                <th>{{ __('Amount') }}</th>
                <th>{{ __('Gateway Name') }}</th>
                <th>{{ __('Transaction') }}</th>
                <th>{{ __('Deposit At') }}</th>
                <th>{{ __('Status') }}</th>
            </thead>
            <tbody>
                @forelse ($wallet_histories as $index => $wallet_history)
                    <tr>
                        <td>{{ ++$index }}</td>

                        <td>{{ currency($wallet_history->amount) }}</td>
                        <td>{{ $wallet_history->payment_gateway }}</td>
                        <td>{{ $wallet_history->transaction_id }}</td>
                        <td>{{ $wallet_history->created_at->format('H:iA, d M Y') }}</td>
                        <td>
                            @if ($wallet_history->payment_status == 'success')
                                success
                            @elseif ($wallet_history->payment_status == 'rejected')
                                rejected
                            @else
                                pending
                            @endif
                        </td>
                    </tr>
                @empty
                    <x-empty-table :name="__('')" route="" create="no" :message="__('No data found!')"
                        colspan="6"></x-empty-table>
                @endforelse

            </tbody>
        </table>



    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('global/js/jquery-3.7.1.min.js') }}"></script>


</body>

</html>
