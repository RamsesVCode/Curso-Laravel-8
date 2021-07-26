<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\MainController;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        // $products =  DB::table('products')->get();
        $products = Product::all();
        // return view('products.index',compact($products));
        return view('products.index')->with(['products'=>$products]);
    }
    public function create(){
        return view('products.create');
    }
    public function store(ProductRequest $request){

        // dd(request()->all(),$request->all(),$request->validated());
        $product = Product::create(request()->all());
        // session()->flash('success',"The new Product with id {$product->id} was created.");
        // session()->forget('error');
        // return redirect()->back();
        // return redirect()->action([MainController::class,'index']);
        return redirect()->route('products.index')
        ->with('success',"The new Product with id {$product->id} was created.");
    }   
    public function show(Product $product){
        // $product = DB::table('products')->find($id);
        // $product = Product::findOrFail($id);
        // dd($product);
        // return view('products.show',compact('product'));
        return view('products.show')->with(['product'=>$product]);
    }
    public function edit(Product $product){
        return view('products.edit')
        ->with(['product'=>$product]);
    }
    public function update(ProductRequest $request, Product $product){
        $product->update($request->validated());
        return redirect()->route('products.index')
        ->with('success',"The Product with id {$product->id} was edited.");;
    }
    public function destroy(Product $product){
        // $product = Product::findOrFail($product);
        $product->delete();
        return redirect()->route('products.index')
        ->with('success',"The Product with id {$product->id} was deleted.");;
    }
}
