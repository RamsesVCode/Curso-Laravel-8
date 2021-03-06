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
                    {{-- @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{session()->get('success')}}
                        </div>
                    @endif
                    @if(isset($errors) && $errors->any())
                        <ul class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    @endif --}}
                    {{-- @yield('content') --}}
                    @empty($products)
                        <div class="alert alert-danger">
                            No products yet!
                        </div>
                    @else            
                    <div class="row">
                            {{-- @dump($products) --}}
                            @foreach($products as $product)
                                <div class="col-3">
                                    @include('components.product-card')
                                </div>
                            @endforeach
                            {{-- @dump($products) --}}
                            {{-- @dd(\DB::getQueryLog()) --}}
                        </div> 
                    @endempty
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
