@extends('layouts.app')

@section('content')
@empty($products)
    <div class="alert alert-warning">
        No hay products
    </div>
@else
    @if(isset($errors) && $errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">
            {{session()->get('success')}}
        </div>
    @endisset
<div class="container flex flex-wrap">
    {{-- @dump($products)
    @foreach($products as $product)
        <div class="card w-3/12">
            <p class="bg-gray-300 p-3 align-center">{{$product->title}}</p>
            @include('components.product-card')
        </div>
    @endforeach
    @dump($products)
    @dd(\DB::getQueryLog()) --}}
    @foreach($products as $product)
        <div class="card w-3/12">
            <p class="bg-gray-300 p-3 align-center">{{$product->title}}</p>
            @include('components.product-card')
        </div>
    @endforeach
</div>
@endempty
@endsection
