<?php
namespace App\Services;
use Illuminate\Support\Facades\Cookie;
use App\Models\Cart;

class CartService{
    public $cookieName = 'cart';
    public function getFromCookie(){
        $cart_id = Cookie::get($this->cookieName);
        $cart = Cart::find($cart_id);
        return $cart;
    }
    public function getFromCookieOrCreate(){
        $cart = $this->getFromCookie();
        return $cart ?? Cart::create();
    }
    public function makeCookie(Cart $cart){
        $cookie = Cookie::make($this->cookieName,$cart->id,7*24*60);
        return $cookie;
    }
    public function countProducts(){
        $cart = $this->getFromCookie();
        if($cart != null){
            return $cart->products->pluck('pivot.quantity')->sum();
        }
        return 0;
    }
}
?>