<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use  App\Models\Category;
use App\Models\Brand;
use App\Models\Product;
use App\Models\MultiImg;
use  App\Models\Subcategory;
use  App\Models\SubsubCategory;

class ProductController extends Controller
{
    public function add_product(){
        $category=Category::latest()->get();
        $brands=Brand::latest()->get();
        return view('admin.products.create',compact('category','brands'));
    }

    public function get_subsubcat($catt_id){
       $subsubcate=Subsubcategory::where('subcategory_id',$catt_id)->orderBy('subsubcategory_name_en','ASC')->get();
        return json_encode($subsubcate);
    }

    /* store */

    public function store_product(Request $request){
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
        ]);

        $image = $request->file('product_thambnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url= 'uploads/products/thumbnail/'.$name_gen;

       $pro_id= Product::insertGetId([
                'brand_id'=>$request->brand_id,
                'category_id'=>$request->category_id,
                'subcategory_id'=>$request->subcategory_id,
                'subsubcategory_id'=>$request->subsubcategory_id,
                'product_name_en'=>$request->product_name_en,
                'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
                'product_name_bn'=>$request->product_name_bn,
                'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
                'product_code'=>$request->product_code,
                'product_qty'=>$request->product_qty,
                'product_tags_en'=>$request->product_tags_en,
                'product_tags_bn'=>$request->product_tags_bn,
                'product_size_en'=>$request->product_size_en,
                'product_size_bn'=>$request->product_size_bn,
                'product_color_en'=>$request->product_color_en,
                'product_color_bn'=>$request->product_color_bn,
                'selling_price'=>$request->selling_price,
                'discount_price'=>$request->discount_price,
                'short_descp_en'=>$request->short_descp_en,
                'short_descp_bn'=>$request->short_descp_bn,
                'long_descp_en'=>$request->long_descp_en,
                'long_descp_bn'=>$request->long_descp_bn,
                'hot_deals'=>$request->hot_deals,
                'featured'=>$request->featured,
                'special_offer'=>$request->special_offer,
                'special_deals'=>$request->special_deals,
                'product_thambnail'=>$save_url,
                'created_at'=>Carbon::now(),

            
        ]); 
        /* Multi image process start */
        $images = $request->file('multi_img'); 
        foreach ($images as $img) {
           
            $name_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('uploads/products/multipaleimage/'.$name_gen);
            $photoname= 'uploads/products/multipaleimage/'.$name_gen;

            MultiImg::insert([
                'product_id'=>$pro_id,
                'photo_name'=>$photoname,
                'created_at'=>Carbon::now(),
            ]);
        }
        $notification = [
            'message' => 'Successfully Product added ',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);

    }
    /* products view */
    public function products(){
        $products=Product::latest()->get();
        return view('admin.products.index',compact('products'));
    }

    /* edit product */
    public function edit($p_id){
        $products = Product::findOrFail($p_id);
        $category=Category::latest()->get();
        $brands=Brand::latest()->get();
        $mul= MultiImg::where('product_id',$p_id)->latest()->get();
        return view('admin.products.edit',compact('products','category','brands','mul'));

    }

    /* delete product */
    public function delet($d_id){
        Product::findOrFail($d_id)->delete();
        $notification = [
            'message' => 'Successfully Product deleted',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }

    /* update product */
    public function product_update_data(Request $request){
        $product_id= $request->product_id;
        $request->validate([
            'category_id'=>'required',
            'subcategory_id'=>'required',
            'subsubcategory_id'=>'required',
        ]);
         Product::findOrFail($product_id)->update([
            'brand_id'=>$request->brand_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'subsubcategory_id'=>$request->subsubcategory_id,
            'product_name_en'=>$request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_name_bn'=>$request->product_name_bn,
            'product_slug_bn' => str_replace(' ','-',$request->product_name_bn),
            'product_code'=>$request->product_code,
            'product_qty'=>$request->product_qty,
            'product_tags_en'=>$request->product_tags_en,
            'product_tags_bn'=>$request->product_tags_bn,
            'product_size_en'=>$request->product_size_en,
            'product_size_bn'=>$request->product_size_bn,
            'product_color_en'=>$request->product_color_en,
            'product_color_bn'=>$request->product_color_bn,
            'selling_price'=>$request->selling_price,
            'discount_price'=>$request->discount_price,
            'short_descp_en'=>$request->short_descp_en,
            'short_descp_bn'=>$request->short_descp_bn,
            'long_descp_en'=>$request->long_descp_en,
            'long_descp_bn'=>$request->long_descp_bn,
            'hot_deals'=>$request->hot_deals,
            'featured'=>$request->featured,
            'special_offer'=>$request->special_offer,
            'special_deals'=>$request->special_deals,
            'created_at'=>Carbon::now(),
       
    ]);  

    $notification = [
        'message' => 'Successfully Product data updated',
        'alert-type' => 'success',
    ];
    return Redirect()->back()->with($notification);
    }




    /* update product thumbnail  */
    public function update_product_thumbnail(Request $request){
        $pro_id= $request->produc_id;
        $oldimg= $request->old_img;
        unlink($oldimg);

        $image = $request->file('product_thambnail');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917, 1000)->save('uploads/products/thumbnail/'.$name_gen);
        $save_url= 'uploads/products/thumbnail/'.$name_gen;

        Product::findOrFail($pro_id)->update([
            'product_thambnail'=>$save_url,
            'updated_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully Thumbnail  updated successfully',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }



    /* update multipale image  */
    public function multi_image_update(Request $request){
        $imgs=$request->multiImg;

        foreach ($imgs as $id => $img) {
            $multi_del=MultiImg::findOrFail($id);
            unlink($multi_del->photo_name);
            $name_gen=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917, 1000)->save('uploads/products/multipaleimage/'.$name_gen);
            $photoname= 'uploads/products/multipaleimage/'.$name_gen;
    
            MultiImg::where('id',$id)->update([
                'photo_name'=>$photoname,
                'updated_at'=>Carbon::now(),
            ]);
        }
        
        $notification = [
            'message' => 'Successfully multimg  updated successfully',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    } 

    /* multii,age delete */
    public function multi_img_delet($pro_id){
        $old_img=MultiImg::findOrFail($pro_id);
        unlink($old_img->photo_name);
        MultiImg::findOrFail($pro_id)->delete();

        $notification = [
            'message' => 'Successfully multimg  Deleted ',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }
     
    public function inactive($id){
        Product::findOrFail($id)->update([ 'status'=>0]);
        $notification = [
            'message' => ' Inactive product',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }

    public function active($id){
        Product::findOrFail($id)->update([ 'status'=>1]);
        $notification = [
            'message' => ' Activated product',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }

}
