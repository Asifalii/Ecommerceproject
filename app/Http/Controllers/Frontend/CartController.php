<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request, $id){
        
        $product=Product::findOrFail($id);
            if ($product->discount_price==null) {
                Cart::add([
                    'id' => $id,
                    'name' => $request->pname,
                    'qty' => $request->qty,
                    'price' => $product->selling_price,
                    'weight' => 1,
                    'options' => ['product_color_en' => $request->product_color_en,
                                    'product_size_en' => $request->product_size_en,
                                    'pimage' => $product->product_thambnail,
                                ],
                    ]);
                    return response()->json(['success'=>'successfully added on your cart']);
            } else {
                Cart::add([
                    'id' => $id,
                    'name' => $request->pname,
                    'qty' => $request->qty,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => ['product_color_en' => $request->product_color_en,
                                    'product_size_en' => $request->product_size_en,
                                    'pimage' => $product->product_thambnail,
                                ],

                    ]);
                    return response()->json(['success'=>'successfully added on your cart']);
            }
    }
    /* bring cart content by calling Cart::content() ai vaby cart model k call kore cart a ja ja content thaky sob pull kora hoy  */
    public function minicart(){
        $carts=Cart::content();
        $cart_qty=Cart::count();
        $cart_total=Cart::total();
        return response()->json(array(
            'carts'=>$carts,
            'cart_qty'=>$cart_qty,
            'cart_total'=>round($cart_total),      
        ));
    }
}
