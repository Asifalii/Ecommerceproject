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
        $skip_category_0=Category::skip(3)->first();
        $skip_product_0=Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();
        $skip_brand_0=Brand::skip(3)->first();
        /* limit(5) or we can use take() function aswell */
        $sliders=Slider::where('status',1)->orderBy('id','DESC')->limit(5)->get();
        $skip_brandproduct_0=Product::where('status',1)->where('brand_id',$skip_brand_0->id)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        $products=Product::where('status',1)->orderBy('id','DESC')->get();
        $featured=Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->get();
        
        $special_offer =Product::where('special_offer',1)->where('status',1)->orderBy('id','DESC')->get();
        $special_deals =Product::where('special_deals',1)->where('status',1)->orderBy('id','DESC')->get();
        return view('frontend.index',compact('categories','sliders','products','featured',
        'special_offer','special_deals','skip_category_0','skip_product_0','skip_brand_0','skip_brandproduct_0'));
    }

    /* =================================single product view ========================================== */
    public function singleproduct($product_id, $slug)
    {
        $product = Product::findOrFail($product_id);
        /* explode() helps us to ignore the coma between 2 colors , $product variable thaky color gula neay nilam  */
        $color_en= $product->product_color_en;
        $product_color_en=explode(',',$color_en);

        $color_bn= $product->product_color_bn;
        $product_color_bn=explode(',',$color_bn);

        $product_size_en= $product->product_size_en;
        $product_size_en=explode(',',$product_size_en);

        $product_size_bn= $product->product_size_bn;
        $product_size_bn=explode(',',$product_size_bn); 

        /*  as  amder akhny kintu category id ta nai , tai aivaby ana jaby $cat_id=$product->category_id; / or 
          $relationalproduct=Product::where('category_id',$product->category_id aivabyo ana jaby ->ordrBy('id','DESC')->get();*/
        $cat_id=$product->category_id;
        $relationalproduct=Product::where('category_id',$cat_id)->where('id','!=',$product_id)->orderBy('id','DESC')->get();
        $multiimgs = MultiImg::where('product_id', $product_id)->get();
        return view('frontend.single_product', compact('product', 'multiimgs','product_color_en','product_color_bn','product_size_en','product_size_bn','relationalproduct'));
    }

    public function tag_product_view($tag){
        $products=Product::where('status',1)->where('product_tags_bn',$tag)->orwhere('product_tags_en',$tag)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.tagwise_product',compact('products','categories'));
    }

    public function subcatwise($subcat_id ,$slug){
        $products=Product::where('status',1)->where('subcategory_id',$subcat_id)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.subcategorywise_product',compact('products','categories'));
    }

    public function subsubcatwise($subsubcat_id ,$slug){
        $products=Product::where('status',1)->where('subsubcategory_id',$subsubcat_id)->orderBy('id','DESC')->get();
        $categories=Category::orderBy('category_name_en','ASC')->get();
        return view('frontend.subsubcategorywise_product',compact('products','categories'));
    }
    /* ======================== view with ajax  --===========================*/
    public function productview_ajax($product_id){
        $product=Product::with('category','brand')->findOrFail($product_id);

        $color_en= $product->product_color_en;
        $product_color_en=explode(',',$color_en);

        $color_bn= $product->product_color_bn;
        $product_color_bn=explode(',',$color_bn);

        $product_size_en= $product->product_size_en;
        $product_size_en=explode(',',$product_size_en);

        $product_size_bn= $product->product_size_bn;
        $product_size_bn=explode(',',$product_size_bn); 

    return response()->json(array(
        'product'=>$product,
        'product_color_en'=>$product_color_en,
        'product_color_bn'=>$product_color_bn,
        'product_size_en'=>$product_size_en,
        'product_size_bn'=>$product_size_bn,


    ));
    }
}