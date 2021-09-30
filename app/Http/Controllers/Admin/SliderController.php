<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class SliderController extends Controller
{
    public function index(){
        $slider = Slider::latest()->get();
        return view('admin.sliders.index',compact('slider'));
    }
    /* slide store */
    public function slider_store(Request $request){
        $request->validate([
            'image'=>'required',
        ]);

        $image = $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870, 370)->save('uploads/sliders/'.$name_gen);
        $save_url= 'uploads/sliders/'.$name_gen;

        Slider::insert([
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'description_en'=>$request->description_en,
            'description_bn'=>$request->description_bn,
            'image'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully Slider added ',
            'alert-type' => 'success',
        ]; 
        return Redirect()->back()->with($notification);
    }

    public function edit($s_id){
        $slider = Slider::findOrFail($s_id);
        return view('admin.sliders.edit',compact('slider'));
    }

    public function update(Request $request){
        $slider_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870, 370)->save('uploads/sliders/'.$name_gen);
            $save_url= 'uploads/sliders/'.$name_gen;

        Slider::findOrFail($slider_id)->update([
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'description_en'=>$request->description_en,
            'description_bn'=>$request->description_bn,
            'image'=>$save_url,
            'created_at'=>Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully brand updated with image',
            'alert-type' => 'success',
        ];
        return Redirect()->route('sliders')->with($notification);

     }else {
        Slider::findOrFail($slider_id)->update([
            'title_en'=>$request->title_en,
            'title_bn'=>$request->title_bn,
            'description_en'=>$request->description_en,
            'description_bn'=>$request->description_bn,
            'created_at'=>Carbon::now(),

        ]);

        $notification = [
            'message' => 'Successfully Slider updated',
            'alert-type' => 'success',
        ];
        return Redirect()->route('sliders')->with($notification);
     }
    }
    public function delet($id){
        $old_image= Slider::findOrFail($id);
        unlink($old_image->image);
        Slider::findOrFail($id)->delete();

        $notification = [
            'message' => 'Successfully Slider deleted',
            'alert-type' => 'success',
        ];
        return Redirect()->route('sliders')->with($notification);
    }
    
    public function inactive($id){
        Slider::findOrFail($id)->update([ 'status'=>0 ]);
        $notification = [
            'message' => ' Inactive Slider',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }

    public function active($id){
        Slider::findOrFail($id)->update([ 'status'=>1 ]);
        $notification = [
            'message' => ' Activated Slider',
            'alert-type' => 'success',
        ];
        return Redirect()->back()->with($notification);
    }

}
