<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CuponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ShippingAreaController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Frontend\Indexcontroller;
use App\Http\Controllers\User\WishlistController;
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
     /*=============================== Cupone routes bellow ================ */
     Route::get('cupone-page',[CuponController::class,'create'])->name('cupone');
     Route::post('cupone-store',[CuponController::class,'store'])->name('cupone-store');
     Route::get('cupon_edit/{c_id}',[CuponController::class,'edit']);
     Route::post('cupon-update',[CuponController::class,'update'])->name('cupon_update');
     Route::get('delet_cupon/{cuppon_id}',[CuponController::class,'destroy']);
     /* shipping district routes bellow  */
     Route::get('division',[ShippingAreaController::class,'create'])->name('division');
     Route::post('division-store',[ShippingAreaController::class,'store'])->name('division-store');
     Route::get('division-edit/{division_id}',[ShippingAreaController::class,'edit']);
     Route::post('division-update',[ShippingAreaController::class,'update'])->name('division-update');
     Route::get('division-delete/{division_id}',[ShippingAreaController::class,'destroy']);
     /* district rotes bellow  */
     Route::get('district',[ShippingAreaController::class,'district_create'])->name('district');
     Route::post('district-store',[ShippingAreaController::class,'district_store'])->name('district-store');
     Route::get('district-edit/{district_id}',[ShippingAreaController::class,'district_edit']);
     Route::post('district-update',[ShippingAreaController::class,'district_update'])->name('district-update');
     Route::get('district-delete/{district_id}',[ShippingAreaController::class,'district_destroy']);
      /* state rotes bellow  */
      Route::get('state',[ShippingAreaController::class,'state_create'])->name('state');
      Route::get('getdistrict/ajax/{division_id}',[ShippingAreaController::class,'get_districtajax']);
      Route::post('state-store',[ShippingAreaController::class,'state_store'])->name('state_store');
      Route::get('state-edit/{state_id}',[ShippingAreaController::class,'state_edit']);
      Route::post('state-update',[ShippingAreaController::class,'state_update'])->name('state_update');
      Route::get('state-delete/{state_id}',[ShippingAreaController::class,'state_destroy']);

});



            // =============================user route=========================
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/data',[UserController::class,'updatedata'])->name('update-profile');
    Route::get('image',[UserController::class,'imagepage'])->name('user-image');
    Route::post('update/image',[UserController::class,'updateimage'])->name('update-image');
    Route::get('change/password',[UserController::class,'change_password_view_page_method'])->name('change_password_view_page');
    Route::post('change/password',[UserController::class,'change_password_method'])->name('change-password');
    /* ============== wishlist page view ======================= */
    Route::get('wishlist-page-view',[WishlistController::class,'create'])->name('wishlist');
    Route::get('/get/wishlist/product_view/',[WishlistController::class,'read_allproduct_wishlist']);
    Route::get('/get/wishlist/product_remove/{id}',[WishlistController::class,'destroy']);


 
}); 
    /* ===================================front end route==============================*/

    Route::get('language/bangla',[LanguageController::class,'bangla'])->name('bangla.language');
    Route::get('language/english',[LanguageController::class,'english'])->name('english.language');
    Route::get('single/product/{id}/{slug}',[IndexController::class,'singleproduct']);
    Route::get('product/tag/{tag}',[IndexController::class,'tag_product_view']);
    /* subcategory wise product show  */
    Route::get('subactegory/product/{subcat_id}/{slug}',[IndexController::class,'subcatwise']);
    Route::get('sub/subactegory/product/{subsubcat_id}/{slug}',[IndexController::class,'subsubcatwise']);
    /* product view with modal  ajan   arekta very very important note , 
    jahetu amra route name ta front end ar jono likci tai prefix na thakar karony product/view/modal/ aivaby  
    likci kaj hoye gacy , prefix thakly kivaby korbo ta wishlist ar route a dakho  */
    Route::get('product/view/modal/{id}',[IndexController::class,'productview_ajax']);
    /* add to cart */
    Route::post('/cart/data/store/{id}',[CartController::class,'addtocart']);
    /* mini cart route  */
    Route::get('/product/view/minicart',[CartController::class,'minicart']);
    Route::get('/minicart/product/remove/{rowId}',[CartController::class,'minicartremove']);
    /* ===========================wish_list route =========================== */
    Route::post('/wishlist/product_add/{product_id}',[CartController::class,'add_to_wish_list']);
    /* my cart routes  */
    Route::get('mycart',[CartController::class,'cart'])->name('mycart');
    Route::get('/get/mycartlist/product_view/',[CartController::class,'get_all_cart']);
    Route::get('/mycart/product_remove/{rowId}',[CartController::class,'remove']);
    Route::get('/mycart/cartincrement/{rowId}',[CartController::class,'increment']);
    Route::get('/mycart/cartdecrement/{rowId}',[CartController::class,'dicrement']);
    

