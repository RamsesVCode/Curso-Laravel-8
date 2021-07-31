<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Services\CartService;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
        $this->middleware('auth');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cart = $this->cartService->getFromCookie();
        return view('orders.create',compact('cart'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = Auth::user();
        $user = $request->user();
        $order = $user->orders()->create([
            'status'=>'pending',
        ]);
        $cart = $this->cartService->getFromCookie();
        $cartProductsWithQuantity = $cart->products
        ->mapWithKeys(function($product){
            $element[$product->id] = ['quantity'=>$product->pivot->quantity];
            return $element;
        });
        
        $order->products()->attach($cartProductsWithQuantity->toArray());
        return redirect()->route('orders.payments.create',compact('order'));
    }
}
