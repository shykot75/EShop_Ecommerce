<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class EShopController extends Controller
{
    public function index(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $sliders = Slider::where('status',1)->orderBy('id','DESC')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id', 'DESC')->limit(10)->get();
        $features = Product::where('featured',1)->where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $hots = Product::where('hot_deals',1)->where('discount_price', '!=', NULL )->where('status',1)->orderBy('id','DESC')->limit(6)->get();
        $specials = Product::where('special_offer',1)->where('status',1)->orderBy('id','DESC')->limit(4)->get();
        $specialDeals = Product::where('special_deals',1)->where('status',1)->orderBy('id','DESC')->limit(4)->get();

        $skip_category_0 = Category::skip(0)->first();
        $skip_product_0 = Product::where('status',1)->where('category_id',$skip_category_0->id)->orderBy('id','DESC')->get();

        $skip_category_3 = Category::skip(3)->first();
        $skip_product_3 = Product::where('status',1)->where('category_id',$skip_category_3->id)->orderBy('id','DESC')->get();

        return view('website.home.index',
            compact('categories',
                'sliders', 'products',
                'features', 'hots',
                'specials', 'specialDeals',
                'skip_category_0', 'skip_product_0',
                'skip_category_3', 'skip_product_3'
            ));
    }

    public function productDetails($id, $slug){
        $product = Product::findOrFail($id);
        $multiImgs = MultiImg::where('product_id',$id)->get();
        return view('website.product.product-details', compact('product', 'multiImgs'));
    }
















}
