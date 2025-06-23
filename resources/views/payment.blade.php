@extends('layout')

@section('main-body')
<p>Paid amount = 100 USD</p>

@include('payment_basic')
@include('payment_addon')

@endsection


