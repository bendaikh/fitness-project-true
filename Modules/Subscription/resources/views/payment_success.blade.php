
<p>Payment successfull</p>
<p>transaction : {{ Session::get('after_success_transaction') }}</p>
<p>Gateway name : {{ Session::get('after_success_gateway') }}</p>
<a href="{{ route('subscription.payment') }}">Go to payment page</a>



