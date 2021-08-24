<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use  App\Models\Category;
use App\Models\Brand;
use  App\Models\Subcategory;
use  App\Models\SubsubCategory;

class ProductController extends Controller
{
    public function add_product(){
        $category=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('admin.products.create',compact('category','brands'));
    }

    public function store_product(Request $request){
        dd($request->all());
    }


    public function get_subsubcat($catt_id){
       $subsubcate=Subsubcategory::where('subcategory_id',$catt_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcate);
    }
}
