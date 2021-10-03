<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Whishlist;
use Gloudemans\Shoppingcart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function create(){
        return view('user.wishlist_page_view');
    }

    public function read_allproduct_wishlist(){
        $wishlist=Whishlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function destroy($id){
        Whishlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success'=>'successfully remove product from this wishlist']);
    }
}
