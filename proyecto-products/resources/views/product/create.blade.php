@extends('layouts.app')

@section('content')
    <h1>Crear producto</h1>
    @if(isset($errors) && $errors->any())
        <ul class="list-group alert alert-danger">
            @foreach($errors->all() as $error)
                <li class="list-group-item">{{$error}}</li>
            @endforeach
        </ul>
    @endisset

    <div class="container col-md-6 p-4 card">
        <form action="{{route('product.store')}}" method="POST" class="form">
    
            @csrf
    
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{old('title')}}">
            </div>    
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" name="description" value="{{old('description')}}">
            </div>    
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" min="1" step="0.1" name="price" value="{{old('price')}}">
            </div>    
            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control" name="stock" value="{{old('stock')}}">
            </div>    
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select name="status" class="form-select">
                    <option>Select...</option>
                    <option value="available" {{old('status')=='available' ? 'selected' : ''}}>Available</option>
                    <option value="unavailable" {{old('status')=='unavailable' ? 'selected' : ''}}>Unavailable</option>
                </select>
            </div>   
            <button type="submit" class="btn btn-primary">Guardar</button> 
        </form>    
    </div>
@endsection