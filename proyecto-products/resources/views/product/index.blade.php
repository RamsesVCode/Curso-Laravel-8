@extends('layouts.app')

@section('content')
    <h1>Lista de productos</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <a href="{{route('product.create')}}" class="btn btn-success mb-3">Crear Producto</a>
    @empty($products)
        <div class="alert alert-warning">No hay productos</div>
    @else
        <table class="table table-striped">
            <tr>
                <th>TITLE</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>STOCK</th>
                <th>STATUS</th>
                <th>OPTIONS</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->title}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->status}}</td>
                    <td>
                        <a href="{{route('product.show',$product->id)}}" class="btn btn-primary mb-2">Show</a>
                        <a href="{{route('product.edit',$product->id)}}" class="btn btn-warning mb-2">Edit</a>
                        <form action="{{route('product.destroy',$product->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mx-auto">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
        </table>
    @endempty
@endsection