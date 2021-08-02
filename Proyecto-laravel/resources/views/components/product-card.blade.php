<div class="card">
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
    <div class="card-body">
        <div class="card-title">
            <h4 class="text-right">$ {{$product->price}}</h4>
            <h5 class="card-title">{{$product->title}}</h5>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">{{$product->stock}} left</p>
            @if(isset($cart))
                <p class="card-text">
                    {{$product->pivot->quantity}} in your cart
                    <strong>($ {{$product->total}})</strong>
                </p>
                <form 
                    class="d-inline"
                    method="POST"
                    action="{{route('products.carts.destroy',['cart'=>$cart->id,'product'=>$product->id])}}"
                >
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-warning">Remove from Cart</button>
                </form>
            @else
                <form 
                    class="d-inline"
                    method="POST"
                    action="{{route('products.carts.store',$product->id)}}"
                >
                    @csrf
                    <button type="submit" class="btn btn-success">Add To Cart</button>
                </form>
            @endif
        </div>
    </div>
</div>