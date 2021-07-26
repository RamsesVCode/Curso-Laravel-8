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
                    <h1>Edit a product</h1>
                    <form action="{{route('products.update',['product'=>$product->id])}}" method="POST">
                
                        @csrf
                        @method('put')
                
                        <div class="form-row">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" value="{{old('title',$product->title)}}" required>
                        </div>
                        <div class="form-row">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control" value="{{ old('description',$product->description) }}" required>
                        </div>
                        <div class="form-row">
                            <label for="price">Price</label>
                            <input type="number" name="price" min="1.00" step="0.01" class="form-control" value="{{old('price',$product->price)}}" required>
                        </div>
                        <div class="form-row">
                            <label for="stock">Stock</label>
                            <input type="number" name="stock" min="0" class="form-control" value="{{old('stock',$product->stock)}}" required>
                        </div>
                        <div class="form-row">
                            <label for="status">Status</label>
                            <select name="status" class="custom-select" required>
                                <option {{ old('status')=='available' ? 'selected' : ($product->status == 'available' ? 'selected' : '') }} value="available">Available</option>
                                <option {{ old('status')=='unavailable' ? 'selected' : ($product->status == 'unavailable' ? 'selected' : '') }} value="unavailable">Unavailale</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <button type="submit" class="btn btn-primary btn-lg">Edit product</button>
                        </div>    
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>