<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\Product;
use App\Models\Whishlist;
use Carbon\Carbon;
use Gloudemans\Shoppingcart\Facades\Cart;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    
    public function minicartremove($rowId){
       Cart::remove($rowId);
       return response()->json(['success'=>'1 prooduct removed from that card  ']);
    }

    /* ass data post ar madhome asty tai Request $request, ai duita parameter obosi lagby */
    /* r jahaety amder user loged in hower por e ai funtion tay hit korby tai check kore nawa 
    lagy , amder case a prefix a auth kora acy , amra taw check korabo cause alert show koranor jono aijy aituku 
    if(Auth::check()){
        
    }else{
        return response()->json(['error'=>' Please loged in first ']);
    }  */
    public function add_to_wish_list(Request $request, $product_id){
        if(Auth::check()){
            $exits=Whishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if(!$exits){
                Whishlist::insert([
                    'user_id'=>Auth::id(),
                    'product_id'=>$product_id,
                    'created_at'=>Carbon::now(),
                ]);
                return response()->json(['success'=>' Successsfully added to your wishlist .. ']);
            }else{
                return response()->json(['error'=>' Product already added to your wishlist .. ']);
            }
          
        }else{
            return response()->json(['error'=>' Please loged in first ']);
        } 
    }
    /*=================== my cart function bellow ================== */
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

    public function increment($rowId){
      
        if(Session::has('cupon')){
           $cupon_name= Session::get('cupon')['cupon_name'];
           $model=Cupon::where('cupon_name',$cupon_name)->first();
                Session::put('cupon',[
                        'cupon_name'=>$model->cupon_name,
                        'cupon_discount'=>$model->cupon_discount,
                        'discount_amount'=>round(Cart::total() * $model->cupon_discount/100),                      
                        'total_amount'=>round(Cart::total() - Cart::total() * $model->cupon_discount/100),
                    ]);
                    
        }
       $row= Cart::get($rowId);
       Cart::update($rowId, $row->qty+1);
       return response()->json('increment');
    }

    public function dicrement($rowId){
        if(Session::has('cupon')){
            $cupon_name= Session::get('cupon')['cupon_name'];
            $model=Cupon::where('cupon_name',$cupon_name)->first();
                 Session::put('cupon',[
                         'cupon_name'=>$model->cupon_name,
                         'cupon_discount'=>$model->cupon_discount,
                         'discount_amount'=>round(Cart::total() * $model->cupon_discount/100),
                         'total_amount'=>round(Cart::total() - Cart::total() * $model->cupon_discount/100),
                     ]);
         }

        $row= Cart::get($rowId);
        Cart::update($rowId, $row->qty-1);
        return response()->json('dicrement');
    }
    /* ===========================cupon start ============================== */
    public function cupon_apply(Request $request){
        $cupon=Cupon::where('cupon_name',$request->cupon_name)->where('cupon_validity','>=',Carbon::now()->format('Y-m-d'))->first();
            if ($cupon) {
                Session::put('cupon',[
                    'cupon_name'=>$cupon->cupon_name,
                    'cupon_discount'=>$cupon->cupon_discount,
                    'discount_amount'=>round(Cart::total() * $cupon->cupon_discount/100),
                    'total_amount'=>round(Cart::total() - Cart::total() * $cupon->cupon_discount/100),
                ]);
                return response()->json(['success'=>'cupon Apllyed successfully ']);
            }else{
                return response()->json(['error'=>'your cupone is not valid']);
            }
    }

    public function cupon_calculation(){

            if(session()->has('cupon')){
                return response()->json(array(
                    'subtotal'=>Cart::total(),
                    'cupon_name'=>session()->get('cupon')['cupon_name'],
                    'discount_amount'=>session()->get('cupon')['discount_amount'],     
                    'total_amount'=>session()->get('cupon')['total_amount'],      
                ));

            }else{
                return response()->json(array(
                    'total'=>Cart::total(),                   
                ));
            }
    }
    public function cupone_remove(){
        session()->forget('cupon');
        return response()->json(['success'=>'your cupone is removed']);
    }
}
