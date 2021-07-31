@extends('layouts.app')

@section('content')
    <h1><strong>Payment confirm</strong></h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <h2 class="text-center"><strong>Grand total: $ {{$order->total}}</strong></h2>
    <form action="{{route('orders.payments.store',$order)}}" method="POST" class="text-center">
        @csrf
        <button type="submit" class="btn btn-success">Pay</button>
    </form>
@endsection