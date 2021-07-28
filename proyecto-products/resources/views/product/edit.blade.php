@extends('layouts.app')

@section('content')
    <h1>Editar Producto</h1>
    <div class="container col-md-6 p-4 card">
        <form action="{{route('product.update',$product->id)}}" method="POST" class="form">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title',$product->title)}}">
            </div>    
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" value="{{old('description',$product->description)}}">
            </div>    
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" min="1" step="0.1" name="price" value="{{old('price',$product->price)}}">
            </div>    
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{old('stock',$product->stock)}}">
            </div>    
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option value="available" {{old('status')=='available' ? 'selected' : ($product->status=='available' ? 'selected' : '')}}>Available</option>
                    <option value="unavailable" {{old('status')=='unavailable' ? 'selected' : ($product->status=='unavailable' ? 'selected' : '')}}>Unavailable</option>
                </select>
            </div>   
            <button type="submit" class="btn btn-primary">Guardar</button> 
        </form>    
    </div>
@endsection