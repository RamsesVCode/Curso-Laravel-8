<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(!isset($cart) || $cart->products->isEmpty())
                        <div class="alert alert-warning">
                            You cart is empty
                        </div>
                    @else     
                    <h4 class="text-center">You cart total <strong>{{$cart->total}}</strong></h4>   
                        <a class="btn btn-success mb-3" href="{{route('orders.create')}}">
                            Start Order
                        </a>    
                        <div class="row">
                            @foreach($cart->products as $product)
                                <div class="col-3">
                                    @include('components.product-card')
                                </div>
                            @endforeach
                        </div> 
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
