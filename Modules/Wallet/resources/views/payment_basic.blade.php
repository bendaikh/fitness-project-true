    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Pay with stripe
    </button>


    <a href="{{ route('wallet.pay-via-paypal', ['payable_amount' => $payable_amount]) }}" class="btn btn-primary">
        Pay with paypal
    </a>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bankModal">
        Pay via direct bank
    </button>


    <!-- stripe Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form  action="{{route('wallet.pay-via-stripe') }}" method="post">
                        @csrf

                        <input type="hidden" name="payable_amount" value="{{ $payable_amount }}">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <div class="form-group">
                                    <label for="card_number">{{ __('Card Number') }}*</label>
                                    <input autocomplete='off' class='form-control card-number' size='20'
                                    type='text' name="card_number" autocomplete="off">

                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="month">{{ __('Month') }}*</label>
                                    <input input
                                    class='form-control card-expiry-month' size='2'
                                    type='text' name="month" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="year">{{ __('Year') }}*</label>
                                    <input class='form-control card-expiry-year' size='4'
                                    type='text' name="year" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-12 my-4">
                                <div class="form-group">
                                    <label for="cvc">{{ __('CVC') }}*</label>
                                    <input autocomplete='off'
                                    class='form-control card-cvc' size='4'
                                    type='text' name="cvc" autocomplete="off">
                                </div>
                            </div>
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                    <button class="btn btn-primary btn-block" type="submit">{{ __('Payment') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    {{-- bank modal --}}

    <div class="modal fade" id="bankModal" tabindex="-1" aria-labelledby="bankModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="bankModalLabel">Pay via direct bank</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    {!! nl2br($basic_payment->bank_information) !!}

                    <form  action="{{route('wallet.pay-via-bank') }}" method="post">
                        @csrf

                        <input type="hidden" name="payable_amount" value="{{ $payable_amount }}">

                        <div class="form-group">
                            <label for="">Provide your transaction</label>
                            <textarea required name="bank_transaction" class="form-control" id="" cols="30" rows="5"></textarea>
                        </div>

                        <button class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
