<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;

// use App\Models\Product;
use App\Models\PanelProduct;
use App\Http\Requests\ProductRequest;
use App\Scopes\AvailableScope;

class ProductController extends Controller
{
    // public function __construct(){
    //     $this->middleware('auth');
    //     // ->except(['index','create']);
    // }

    public function index(){
        $products = PanelProduct::without('images')->get();
        // $products = PanelProduct::with('images')->get();
        // return view('product.index',compact('products'));
        // $products = Product::withoutGlobalScope(AvailableScope::class)->get();
        return view('product.index',compact('products'));
    }
    
    public function create(){
        return view('product.create');
    }
    
    public function store(ProductRequest $request){
        $product = PanelProduct::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);
        return redirect()->route('product.index');
    }
    public function show($id){
        $product = PanelProduct::find($id);
        // dd($product->images);
        return view('product.show',compact('product'));
    }
    public function edit($id){
        $product = PanelProduct::find($id);
        return view('product.edit',compact('product'));
    }

    public function update(ProductRequest $request, PanelProduct $product){
        $product->update($request->all());
        return view('product.edit',compact('product'));
    }
    public function destroy(PanelProduct $product){
        $product->delete();
        // session()->flash('success','Delete success');
        return redirect()->route('product.index')
        ->with('success','Delete success');
    }
}
