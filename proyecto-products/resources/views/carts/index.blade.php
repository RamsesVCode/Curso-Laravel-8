@extends('layouts.app')

@section('content')
@if(!isset($cart->products) || $cart->products->isEmpty())
    <div class="alert alert-warning">
        You cart is empty
    </div>
@else
    <div class="container flex flex-wrap">
        @foreach($cart->products as $product)
            <div class="card w-3/12">
                <p class="bg-gray-300 p-3 align-center">{{$product->title}}</p>
                @include('components.product-card')
            </div>
        @endforeach
    </div>
@endif
@endsection
