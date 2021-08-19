<?php

namespace App\Http\Controllers\Admin;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Category;
use  App\Models\Subcategory;
class CategoryController extends Controller
{
    public function index(){
        $category = Category::latest()->get();
        return view('admin.category.index',compact('category'));
    }

    public function store(Request $request){
       $request->validate([
        'category_name_en' => 'required',
        'category_name_bn' => 'required',
        'category_icon' => 'required',
       ]);

       Category::insert([
           'category_icon'  => $request->category_icon,
           'category_name_en' =>$request->category_name_en,
           'category_name_bn' =>$request->category_name_bn,
           'category_slug_en'=>strtolower(str_replace('','-',$request->category_name_en)),
           'category_slug_bn'=>str_replace('','-',$request->category_name_bn),
           'created_at'=> Carbon::now(),
       ]);
       $notification = [
        'message' => 'Successfully category Stored',
        'alert-type' => 'success',
    ];
    return Redirect()
        ->route('Category')
        ->with($notification);
    }

    /* category edit */
    public function edit($ca_id){
        $category = Category::findOrFail($ca_id);
        return view('admin.category.edit',compact('category'));
    }

    public function update(Request $request){
        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_icon'  => $request->category_icon,
            'category_name_en' =>$request->category_name_en,
            'category_name_bn' =>$request->category_name_bn,
            'category_slug_en'=>strtolower(str_replace('','-',$request->category_name_en)),
            'category_slug_bn'=>str_replace('','-',$request->category_name_bn),
            'created_at'=> Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully category updated',
            'alert-type' => 'success',
        ];
        return Redirect()
            ->route('Category')
            ->with($notification);

    }

    public function delete($c_id){
        Category::findOrFail($c_id)->delete();
        $notification = [
            'message' => 'Successfully category deleted',
            'alert-type' => 'success',
        ];
        return Redirect()->route('Category')->with($notification);
    }
    /* ======================================= sub category========================== */

    public function sub_index(){
        $subcategories = Subcategory::latest()->get();
        $categories = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.subcategory.sub_index', compact('subcategories','categories'));
    }

    /* ===========================sub category function store======================== */

    public function sub_store(Request $request){
        $request->validate([
            'subcategory_name_en' => 'required',
            'subcategory_name_bn' => 'required',
            'category_id' => 'required',
           ],[
               'category_id.required'=>'This is must!!!'
           ]);
           Subcategory::insert([
            'category_id'  => $request->category_id,
            'subcategory_name_en' =>$request->subcategory_name_en,
            'subcategory_name_bn' =>$request->subcategory_name_bn,
            'subcategory_slug_en'=>strtolower(str_replace('','-',$request->subcategory_name_en)),
            'subcategory_slug_bn'=>str_replace('','-',$request->subcategory_name_bn),
            'subcategory_slug_bn'=>str_replace('','-',$request->subcategory_name_bn),
            'created_at'=> Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully subcategory added',
            'alert-type' => 'success',
        ];
        return Redirect()
            ->route('sub_Category')
            ->with($notification);
    }
    /*====================== sub cat edit =============================== */
    public function sub_edit($cat_id){
        $subcategory = Subcategory::findOrFail($cat_id);
        $category = Category::orderBy('category_name_en','ASC')->get();
        return view('admin.subcategory.edit',compact('subcategory','category'));
    }
/* ============================update sub category  =============================*/
    public function update_sub_cat(Request $request){
        $subcategory = $request->id;

        Subcategory::findOrFail($subcategory)->update([
            'category_id'  => $request->category_id,
            'subcategory_name_en' =>$request->subcategory_name_en,
            'subcategory_name_bn' =>$request->subcategory_name_bn,
            'subcategory_slug_en'=>strtolower(str_replace('','-',$request->subcategory_name_en)),
            'subcategory_slug_bn'=>str_replace('','-',$request->subcategory_slug_bn),
            'created_at'=> Carbon::now(),
        ]);
        $notification = [
            'message' => 'Successfully Subcategory updated',
            'alert-type' => 'success',
        ];
        return Redirect()
            ->route('sub_Category')
            ->with($notification);
    }
    /* ===================delet subcategory================= */
    
    public function delet_sub($cat_id){
        Subcategory::findOrFail($cat_id)->delete();
        $notification = [
            'message' => 'Successfully Subcategory Deleted',
            'alert-type' => 'success',
        ];
        return Redirect()
            ->route('sub_Category')
            ->with($notification);
    }
}
