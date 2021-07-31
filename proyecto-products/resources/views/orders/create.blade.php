@extends('layouts.app')

@section('content')
    <h1>Order Details</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <p class="text-center"><strong>Grand total: $ {{$cart->total}}</strong></p>
    <div class="text-center">
        <form action="{{route('orders.store')}}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success mx-auto">Confirm Order</button>
        </form>
    </div>
    @empty($cart->products)
        <div class="alert alert-warning">You order is empty</div>
    @else
        <table class="table table-striped">
            <tr>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
            </tr>
            @foreach ($cart->products as $product)
                <tr>
                    <td><img src="{{asset($product->images->first()->path)}}" width="100">
                    {{$product->description}}
                </td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->pivot->quantity}}</td>
                    <td>{{$product->total}}</td>
                </tr>
                @endforeach
        </table>
    @endempty
@endsection