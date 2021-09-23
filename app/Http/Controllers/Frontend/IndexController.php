<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\MultiImg;
use App\Models\Slider;

class IndexController extends Controller
{
    public function index()
    {

        $special_deals =Product::where('special_deals',1)->where('status',1)->orderBy('id','DESC')->get();
        $special_offer =Product::where('special_offer',1)->where('status',1)->orderBy('id','DESC')->get();
        $hot_deals =Product::where('hot_deals',1)->where('status',1)->orderBy('id','DESC')->get();
        $featured=Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->get();
        $products=Product::where('status',1)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        /* limit(5) or we can use take() function aswell */
        $sliders=Slider::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        return view('frontend.index',compact('categories','sliders','products','featured','hot_deals','special_offer','special_deals'));
    }
/* =================================single product view ========================================== */
    public function singleproduct($id, $slug)
    {
        $product = Product::findOrFail($id);
        $multiimgs = MultiImg::where('product_id', $id)->get();
        return view('frontend.single_product', compact('product', 'multiimgs'));
    }

}