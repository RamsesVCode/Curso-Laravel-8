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
                    <h1>Lista de productos</h1>
    <a href="{{route('products.create')}}" class="btn btn-success">Create product</a>
    @empty($products)
        <div class="alert alert-warning">
            Esta lista de productos esta vacia
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>ID</th>
                        <th>TITULO</th>
                        <th>DESCRIPCION</th>
                        <th>PRICE</th>
                        <th>STOCK</th>
                        <th>STATUS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->title}}</td>
                        <td>{{$value->description}}</td>
                        <td>{{$value->price}}</td>
                        <td>{{$value->stock}}</td>
                        <td>{{$value->status}}</td>
                        <td>
                            <a href="{{route('products.show',$value->id)}}" class="btn btn-link">View product</a>
                            <a href="{{route('products.edit',$value->id)}}" class="btn btn-link">Edit Product</a>
                            {{-- <a href="{{route('products.delete',$value->id)}}" class="btn btn-link">Edit Product</a> --}}

                            <form action="{{route('products.destroy',$value->id)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endempty
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
