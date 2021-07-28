@extends('layouts.app')

@section('content')
    <div class="card col-md-6 mx-auto mt-5">
        <div class="card-header">
            {{$product->title}}
        </div>
        <div class="card-body">
            @include('components.product-card')
        </div>
    </div>
@endsection