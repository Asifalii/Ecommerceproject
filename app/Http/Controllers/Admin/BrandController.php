<?php

namespace App\Http\Controllers\Admin;
use Intervention\Image\Facades\Image;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;

class BrandController extends Controller
{
   public function index(){
       $brands = Brand::latest()->get();
       return view('admin.brands.index',compact('brands'));
   }

   public function brand_store(Request $request){
       
       $request->validate([
           'brand_name_en' => 'required',
           'brand_name_bn' => 'required',
           'brand_image' => 'required',
           
       ],[
           'brand_name_en.required' =>'brand name din pilig',
       ]);
    
       $image = $request->file('brand_image');
       $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
       Image::make($image)->resize(166, 110)->save('uploads/brands/'.$name_gen);
       $save_url= 'uploads/brands/'.$name_gen;

       Brand::insert([
           'brand_name_en'=>$request->brand_name_en,
           'brand_name_bn'=>$request->brand_name_bn,
           'brand_slug_en'=>strtolower(str_replace('','-',$request->brand_name_en)),
           'brand_slug_bn'=>str_replace('','-',$request->brand_name_bn),
           'brand_image'=> $save_url,
           'created_at'=>Carbon::now(),

       ]);
       $notification = [
        'message' => 'Successfully brand added',
        'alert-type' => 'success',
    ];
    return Redirect()->route('brands')->with($notification);

   }


   /* edit brand  */
   public function edit($brand_id){
       $brand = Brand::findOrFail($brand_id);
       return view('admin.brands.edit',compact('brand'));
   }


   /* update brand */
   public function update_brand(Request $request){
     $brand_id = $request->id;
     $old_image = $request->old_image;
     
     if ($request->file('brand_image')) {
            $image = $request->file('brand_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(166, 110)->save('uploads/brands/'.$name_gen);
            $save_url= 'uploads/brands/'.$name_gen;
    
        Brand::findOrFail($brand_id)->update([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_bn'=>$request->brand_name_bn,
            'brand_slug_en'=>strtolower(str_replace('','-',$request->brand_name_en)),
            'brand_slug_bn'=>str_replace('','-',$request->brand_name_bn),
            'brand_image'=> $save_url,
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully brand updated with image',
            'alert-type' => 'success',
        ];
        return Redirect()
            ->route('brands')
            ->with($notification);

     }else {
        Brand::findOrFail($brand_id)->update([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_bn'=>$request->brand_name_bn,
            'brand_slug_en'=>strtolower(str_replace('','-',$request->brand_name_en)),
            'brand_slug_bn'=>str_replace('','-',$request->brand_name_bn),
            'created_at'=>Carbon::now(),
        ]);

        $notification = [
            'message' => 'Successfully brand updated',
            'alert-type' => 'success',
        ];
        return Redirect()
            ->route('brands')
            ->with($notification);
     }
    }

    /* delet dbrand */

    public function delete($brand_id){

       $brand=Brand::findOrFail($brand_id);
       $img =$brand->brand_image;
       unlink($img);
       Brand::findOrFail($brand_id)->delete();
       $notification = [
        'message' => 'Successfully brand deleted ',
        'alert-type' => 'success',
        ]; 
        return Redirect()->back()->with($notification);

    }
    
    
} 

