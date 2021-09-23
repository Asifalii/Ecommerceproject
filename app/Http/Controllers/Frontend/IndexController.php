<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
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
        $hot_deals =Product::where('hot_deals',1)->where('status',1)->where('discount_price','!=',null)->orderBy('id','DESC')->get();
        $featured=Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->get();
        $products=Product::where('status',1)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        /* limit(5) or we can use take() function aswell */
        $sliders=Slider::where('status',1)->orderBy('id','DESC')->limit(5)->get();

        $skip_category_0=Category::skip(3)->first();
        $skip_product_0=Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
        $skip_brand_0=Brand::skip(3)->first();
        $skip_brandproduct_0=Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get();
        return view('frontend.index',compact('categories','sliders','products','featured',
        'hot_deals','special_offer','special_deals','skip_category_0','skip_product_0','skip_brand_0','skip_brandproduct_0'));
    }
/* =================================single product view ========================================== */
    public function singleproduct($id, $slug)
    {
        $product = Product::findOrFail($id);
        $multiimgs = MultiImg::where('product_id', $id)->get();
        return view('frontend.single_product', compact('product', 'multiimgs'));
    }

    public function tag_product_view($tag){
        $product=Product::where('status',1)->where('product_tags_bn',$tag)->orwhere('product_tags_en',$tag)->orderBy('id','DESC')->get();
        return view('frontend.tagwise_product',compact('product'));
    }
}