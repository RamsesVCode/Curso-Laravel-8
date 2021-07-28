@extends('layouts.app')

@section('content')
@empty($products)
    <div class="alert alert-warning">
        No hay products
    </div>
@else
<div class="container flex flex-wrap">
    @foreach($products as $product)
        <div class="card w-3/12">
            <p class="bg-gray-300 p-3 align-center">{{$product->title}}</p>
            @include('components.product-card')
        </div>
    @endforeach
</div>
@endempty
@endsection
