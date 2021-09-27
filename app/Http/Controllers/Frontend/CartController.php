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
                    'options' => ['product_color_en' => $request->product_color_en],
                    'options' => ['product_size_en' => $request->product_size_en],
                    'options' => ['pimage' => $product->product_thambnail], 
                    ]);
                    return response()->json(['success'=>'successfully added on your cart']);
            } else {
                Cart::add([
                    'id' => $id,
                    'name' => $request->pname,
                    'qty' => $request->qty,
                    'price' => $product->discount_price,
                    'weight' => 1,
                    'options' => ['product_color_en' => $request->product_color_en],
                    'options' => ['product_size_en' => $request->product_size_en],
                    'options' => ['pimage' => $product->product_thambnail],
                    ]);
                    return response()->json(['success'=>'successfully added on your cart']);
            }
    }
}
