<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

use App\Models\Product;
use App\Models\MultiImg;
class IndexController extends Controller
{
    public function index()
    {
        $categories=Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.index',compact('categories'));
    }

    public function singleproduct($id, $slug)
    {
        $products = Product::findOrFail($id);
        $multiimgs = MultiImg::where('product_id', $id)->get();
        return view('frontend.index', compact('products', 'multiimgs'));
    }

}