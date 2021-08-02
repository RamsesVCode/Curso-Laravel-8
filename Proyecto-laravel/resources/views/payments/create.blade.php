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
                    <h1>Payment details</h1>
                    <h4 class="text-center">
                        <strong>Grand total: {{$order->total}}</strong>
                    </h4>

                    <div class="text-center mb-3">
                        <form 
                        class="d-inline"
                        method="POST"
                        action="{{route('orders.payments.store',$order)}}"
                        >
                            @csrf
                            <button type="submit" class="btn btn-success">Pay</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
