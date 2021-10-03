<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartPageController extends Controller
{
    public function cart(){
        return view  ('user.cart_product_list');
    }

    public function get_all_cart(){
        $carts=Cart::content();
        $cart_qty=Cart::count();
        $cart_total=Cart::total();
        return response()->json(array(
            'carts'=>$carts,
            'cart_qty'=>$cart_qty,
            'cart_total'=>round($cart_total),      
        ));
    }

    public function remove($rowId){
        Cart::remove($rowId);
        return response()->json(['success'=>'successfully remove product from this Mycart']);
    }
}
