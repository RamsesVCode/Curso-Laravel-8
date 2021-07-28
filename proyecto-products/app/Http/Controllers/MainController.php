<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class MainController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('welcome',compact('products'));
    }
}
