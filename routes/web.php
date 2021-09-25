<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\Indexcontroller;
use Illuminate\Support\Facades\Auth;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/',[Indexcontroller::class,'index']);


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// =============================admin route=======================
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    /* admin profile view edit routes */
    Route::get('profile',[AdminController::class,'admin_profile_view_method'])->name('admin_profile');
    Route::post('data_update',[AdminController::class,'update_data'])->name('data_update');
    /* image update  route , nedd 2 routes */
    Route::get('image',[AdminController::class,'imagepage'])->name('admin_image');
    Route::post('image',[AdminController::class,'update_image'])->name('admin_image_update');
    /* update pass , need 2 rotes */
    Route::get('update/password',[AdminController::class,'update_pass_vied_method'])->name('update_pass_view');
    Route::post('update/password',[AdminController::class,'update_pass_method'])->name('update-pass');
    /* brand route */
    Route::get('brand/page',[BrandController::class,'index'])->name('brands');
    Route::post('brand/store/',[BrandController::class,'brand_store'])->name('brand-store');
    Route::get('edit_brand/{brand_id}',[BrandController::class,'edit']);
    Route::post('brand/update',[BrandController::class,'update_brand'])->name('update-brand');
    Route::get('delet_item/{brand_id}',[BrandController::class,'delete']);
     /* category route */
    Route::get('Category',[CategoryController::class,'index'])->name('Category');
    Route::post('Category/store',[CategoryController::class,'store'])->name('category-store');
    Route::get('Category_edit/{ca_id}',[CategoryController::class,'edit']);
    Route::post('catgory/update',[CategoryController::class,'update'])->name('category_update');
    Route::get('delete/{c_id}',[CategoryController::class,'delete']);
     /* sub category roye */
     Route::get('sub-Category',[CategoryController::class,'sub_index'])->name('sub_Category');
     Route::post('SubCategory/store',[CategoryController::class,'sub_store'])->name('subcategory_store');
     Route::get('sub-category-edit/{cat_id}',[CategoryController::class,'sub_edit']);
     Route::post('update_sub_cat',[CategoryController::class,'update_sub_cat'])->name('update_sub_cat');
     Route::get('sub-category-delete/{cat_id}',[CategoryController::class,'delet_sub']);
     /* sub sub category route */
     
     Route::get('sub-sub-Category',[CategoryController::class,'subsub_index'])->name('sub_sub_Category');
     Route::get('subcategory/ajax/{ca_id}',[CategoryController::class,'get_subcat']);
     Route::post('subSubCategory/store',[CategoryController::class,'sub_sub_store'])->name('sub_sub_categorystore');
     Route::get('edit_subsub_cat/{c_id}',[CategoryController::class,'sub_sub_edit']);
     Route::post('update_subsub_cat',[CategoryController::class,'update_subsub_cat'])->name('update_subsub_category');
     Route::get('subsub-category-delete/{ca_id}',[CategoryController::class,'delet_subsub']);
     /* product route bellow  */
     Route::get('product/',[ProductController::class,'add_product'])->name('create_product');
     Route::post('Product/store',[ProductController::class,'store_product'])->name('store_product');
     Route::get('subsubcategory/ajax/{catt_id}',[ProductController::class,'get_subsubcat']);
     Route::get('product/view',[ProductController::class,'products'])->name('products');
     Route::get('edit-product/{p_id}',[ProductController::class,'edit']);
     Route::get('delet-product/{d_id}',[ProductController::class,'delet']);

     Route::post('product/data/update',[ProductController::class,'product_update_data'])->name('product_update_data');
     Route::post('product/multipale-image/update',[ProductController::class,'multi_image_update'])->name('multi_image_update');
     Route::post('product/thumbnail-image/update',[ProductController::class,'update_product_thumbnail'])->name('update-product-thumbnail');
     Route::get('multiimage_delete/{pro_id}',[ProductController::class,'multi_img_delet']);
     Route::get('product_active/{id}',[ProductController::class,'active']);
     Route::get('product_inactive/{id}',[ProductController::class,'inactive']);
     /* slider route */
     Route::get('sliders',[SliderController::class,'index'])->name('sliders');
     Route::post('Slider/store/',[SliderController::class,'slider_store'])->name('slider-store');
     Route::get('slider_edit/{s_id}',[SliderController::class,'edit']);
     Route::post('slider_update',[SliderController::class,'update'])->name('slider_update');
     Route::get('slider_delet/{id}',[SliderController::class,'delet']);
     Route::get('slider_active/{id}',[SliderController::class,'active']);
     Route::get('slider_inactive/{id}',[SliderController::class,'inactive']);
});



            // =============================user route=========================
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/data',[UserController::class,'updatedata'])->name('update-profile');
    Route::get('image',[UserController::class,'imagepage'])->name('user-image');
    Route::post('update/image',[UserController::class,'updateimage'])->name('update-image');
    Route::get('change/password',[UserController::class,'change_password_view_page_method'])->name('change_password_view_page');
    Route::post('change/password',[UserController::class,'change_password_method'])->name('change-password');
 
}); 
/* ===================================front end route==============================*/

    Route::get('language/bangla',[LanguageController::class,'bangla'])->name('bangla.language');
    Route::get('language/english',[LanguageController::class,'english'])->name('english.language');
    Route::get('single/product/{id}/{slug}',[IndexController::class,'singleproduct']);
    Route::get('product/tag/{tag}',[IndexController::class,'tag_product_view']);
    /* subcategory wise product show  */
    Route::get('subactegory/product/{subcat_id}/{slug}',[IndexController::class,'subcatwise']);
    Route::get('sub/subactegory/product/{subsubcat_id}/{slug}',[IndexController::class,'subsubcatwise']);
