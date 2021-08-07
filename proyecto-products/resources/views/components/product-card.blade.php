<div id="carousel{{$product->id}}" class="carousel slide carousel-fade">
    <div class="carousel-inner">
        @foreach($product->images as $image)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img class="d-block w-100 card-image-top"src="{{asset($image->path)}}" style="height:500px;object-fit:cover"/>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carousel{{$product->id}}" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#carousel{{$product->id}}" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>
</div>



{{-- <img style="height:350px;object-fit:cover" src="{{asset($product->images->first()->path)}}"> --}}
<p class="text-right"><strong>{{$product->price}}</strong></p>
<p>{{$product->description}}</p>
<p>{{$product->stock}} left</p>
@if(isset($cart))
    <p><strong>{{$product->pivot->quantity}} in you cart ($ {{$product->total}})</strong></p>
    <form action="{{route('products.carts.destroy',['product'=>$product->id,'cart'=>$cart->id])}}" method="POST">
        @csrf
        @method('DELETE')
        <button class="btn btn-warning" type="submit">Remove from Cart</button>
    </form>
@else
    <form action="{{route('products.carts.store',$product->id)}}" method="POST">
        @csrf
        <button class="btn btn-success" type="submit">Add to Cart</button>
    </form>
@endif