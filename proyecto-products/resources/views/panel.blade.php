@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{route('product.index')}}"><li class="list-group-item btn btn-primary text-secondary text-start">PRODUCTS</li></a>
                        <a href="#"><li class="list-group-item btn btn-primary text-secondary text-start">Option1</li></a>
                        <a href="#"><li class="list-group-item btn btn-primary text-secondary text-start">Option2</li></a>
                        <a href="#"><li class="list-group-item btn btn-primary text-secondary text-start">Option3</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
