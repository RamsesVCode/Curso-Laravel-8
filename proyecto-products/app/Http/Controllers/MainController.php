<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
// use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(){
        // \DB::connection()->enableQueryLog();
        // $products = Product::available()->get();
        // $products = Product::with('images')->get();
        $products = Product::all();
        return view('welcome',compact('products'));
    }
}
