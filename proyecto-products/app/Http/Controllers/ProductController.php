<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Product;
use App\Http\Requests\ProductRequest;
class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        // ->except(['index','create']);
    }

    public function index(){
        $products = Product::all();
        return view('product.index',compact('products'));
    }
    public function create(){
        return view('product.create');
    }
    
    public function store(ProductRequest $request){
        $product = Product::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'status' => $request->status,
        ]);
        return redirect()->route('product.index');
    }
    public function show($id){
        $product = Product::find($id);
        return view('product.show',compact('product'));
    }
    public function edit($id){
        $product = Product::find($id);
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, Product $product){
        $request->validate([
            'title' => 'required|min:5|max:255',
            'description' => 'required|min:5|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'status' => 'required|in:available,unavailable',
        ]);


        $product->update($request->all());
        return view('product.edit',compact('product'));
    }
    public function destroy(Product $product){
        $product->delete();

        // session()->flash('success','Delete success');

        return redirect()->route('product.index')
        ->with('success','Delete success');
    }
}
