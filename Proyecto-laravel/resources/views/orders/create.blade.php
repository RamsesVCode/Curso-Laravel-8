<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1>Order details</h1>
                    <h4 class="text-center">
                        <strong>Grand total: {{$cart->total}}</strong>
                    </h4>

                    <div class="text-center mb-3">
                        <form 
                        class="d-inline"
                        method="POST"
                        action="{{route('orders.store')}}"
                        >
                            @csrf
                            <button type="submit" class="btn btn-success">Confirm order</button>
                        </form>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-light">
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->products as $value)
                                <tr>
                                    <td>
                                        <img src="{{asset($value->images->first()->path)}}" width="100">
                                        {{$value->title}}
                                    </td>
                                    <td>{{$value->price}}</td>
                                    <td>{{$value->pivot->quantity}}</td>
                                    <td>
                                        <strong>
                                            $ {{$value->total}}
                                        </strong>
                                   </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
