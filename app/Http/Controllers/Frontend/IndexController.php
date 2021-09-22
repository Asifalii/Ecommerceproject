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
        $categories=Category::orderBy('category_name_en','ASC')->get();
        /* limit(5) or we can use take() function aswell */
        $sliders=Slider::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        return view('frontend.index',compact('categories','sliders'));
    }

    public function singleproduct($id, $slug)
    {
        $products = Product::findOrFail($id);
        $multiimgs = MultiImg::where('product_id', $id)->get();
        return view('frontend.index', compact('products', 'multiimgs'));
    }

}