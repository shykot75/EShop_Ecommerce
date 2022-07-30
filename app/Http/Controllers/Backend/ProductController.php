<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{

    public function getImageUrl($request){
        $image = $request->file('product_thumbnail');
        $codeGen = hexdec(uniqid());
        $imageName = $image->getclientOriginalName();
        $imageFullName = $codeGen.'_'.$imageName;
        $directory = 'upload/product-images/thumbnails/';
        Image::make($image)->resize(917,1000)->save($directory.$imageFullName);
//        $image->move($directory, $imageFullName);
        return $directory.$imageFullName;
    }

    public function addProduct(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $brands = Brand::all();
        return view('admin-control.product.add_product', compact('categories', 'brands'));
    }

    //Product Create Method Start
    public function createProduct(Request $request){
        $product = new Product();
        $product->brand_id          = $request->brand_id;
        $product->category_id       = $request->category_id;
        $product->subcategory_id    = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name_en   = $request->product_name_en;
        $product->product_name_ban  = $request->product_name_ban;
        $product->product_slug_en   = strtolower(str_replace(' ', '-',$request->product_name_en));
        $product->product_slug_ban  = strtolower(str_replace(' ', '-',$request->product_name_ban));
        $product->product_code      = $request->product_code;
        $product->product_quantity  = $request->product_quantity;
        $product->product_tags_en   = $request->product_tags_en;
        $product->product_tags_ban  = $request->product_tags_ban;
        $product->product_size_en   = $request->product_size_en;
        $product->product_size_ban  = $request->product_size_ban;
        $product->product_color_en  = $request->product_color_en;
        $product->product_color_ban = $request->product_color_ban;
        $product->selling_price     = $request->selling_price;
        $product->discount_price    = $request->discount_price;
        $product->short_desc_en     = $request->short_desc_en;
        $product->short_desc_ban    = $request->short_desc_ban;
        $product->long_desc_en      = $request->long_desc_en;
        $product->long_desc_ban     = $request->long_desc_ban;
        $product->product_thumbnail = $this->getImageUrl($request);
        $product->hot_deals         = $request->hot_deals;
        $product->featured          = $request->featured;
        $product->special_offer     = $request->special_offer;
        $product->special_deals     = $request->special_deals;
        $product->created_at        = Carbon::now();
        $product->save();

        // ----- Multi Image -----
        $images = $request->file('multi_img');
        foreach($images as $img){
            $make_name = hexdec(uniqid()).'_'.$img->getClientOriginalName();
            Image::make($img)->resize(917,1000)->save('upload/product-images/multi-images/'.$make_name);
            $uploadPath = 'upload/product-images/multi-images/'.$make_name;
            $multiImg = new MultiImg();
            $multiImg->product_id = $product->id;
            $multiImg->photo_name = $uploadPath;
            $multiImg->created_at = Carbon::now();
            $multiImg->save();
        }
        // ----- Multi Image -----

        $notification = array(
            'message' => 'Product Created Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->route('manage.product')->with($notification);

    } //Product Create Method End

    public function manageProduct(){
        $products = Product::latest()->get();
        return view('admin-control.product.manage_product', compact('products'));
    }

    //Product Edit Method Start
    public function editProduct($id){
        $product = Product::findOrFail($id);
        $brands = Brand::all();
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subSubcategories = SubSubCategory::orderBy('subsubcategory_name_en', 'ASC')->get();
        $multiImages = MultiImg::where('product_id',$id)->get();
        return view('admin-control.product.edit_product',
            compact('product',
                          'brands',
                            'categories',
                            'subcategories',
                            'subSubcategories',
                            'multiImages'
        ));
    } //Product Edit Method End

    //Product Update Method Start
    public function updateProduct(Request $request,$id){
        $product = Product::find($id);
        $product->brand_id          = $request->brand_id;
        $product->category_id       = $request->category_id;
        $product->subcategory_id    = $request->subcategory_id;
        $product->subsubcategory_id = $request->subsubcategory_id;
        $product->product_name_en   = $request->product_name_en;
        $product->product_name_ban  = $request->product_name_ban;
        $product->product_slug_en   = strtolower(str_replace(' ', '-',$request->product_name_en));
        $product->product_slug_ban  = strtolower(str_replace(' ', '-',$request->product_name_ban));
        $product->product_code      = $request->product_code;
        $product->product_quantity  = $request->product_quantity;
        $product->product_tags_en   = $request->product_tags_en;
        $product->product_tags_ban  = $request->product_tags_ban;
        $product->product_size_en   = $request->product_size_en;
        $product->product_size_ban  = $request->product_size_ban;
        $product->product_color_en  = $request->product_color_en;
        $product->product_color_ban = $request->product_color_ban;
        $product->selling_price     = $request->selling_price;
        $product->discount_price    = $request->discount_price;
        $product->short_desc_en     = $request->short_desc_en;
        $product->short_desc_ban    = $request->short_desc_ban;
        $product->long_desc_en      = $request->long_desc_en;
        $product->long_desc_ban     = $request->long_desc_ban;
        $product->hot_deals         = $request->hot_deals;
        $product->featured          = $request->featured;
        $product->special_offer     = $request->special_offer;
        $product->special_deals     = $request->special_deals;
        $product->created_at        = Carbon::now();
        $product->save();

        $notification = array(
            'message' => 'Product Updated Without Images Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.product')->with($notification);

    } //Product Update Method End

    //Product's Multiple Image Update Method Start
    public function updateProductMultiImage(Request $request){
        $imgs = $request->multi_img;
        foreach($imgs as $id => $img){
            $imgDel = MultiImg::findOrFail($id);
            unlink($imgDel->photo_name);

            $make_name = hexdec(uniqid()).'_'.$img->getClientOriginalName();
            Image::make($img)->resize(917,1000)->save('upload/product-images/multi-images/'.$make_name);
            $uploadPath = 'upload/product-images/multi-images/'.$make_name;

           MultiImg::where('id',$id)->update([
               'photo_name' => $uploadPath,
               'updated_at' => Carbon::now(),
           ]);
        } //end foreach
        $notification = array(
            'message' => 'Multiple Images of Product Updated Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);

    } //Product's Multiple Image Update Method End

    //Product's Thumbnail Image Update Method Start
    public function updateProductThumbImage(Request $request, $id){
        $thumImg = Product::find($id);

        if($request->file('product_thumbnail')){
            if(file_exists($thumImg->product_thumbnail)){
                unlink($thumImg->product_thumbnail);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else{
            $imageUrl = $thumImg->product_thumbnail;
        }
        $thumImg->product_thumbnail = $imageUrl;
        $thumImg->updated_at = Carbon::now();
        $thumImg->save();

        $notification = array(
            'message' => 'Thumbnail of Product Updated Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);


    } //Product's Thumbnail Image Update Method Ends


    //Product's Multiple Image Delete Method Starts
    public function deleteProductMultiImage($id){
        $multiImg = MultiImg::findOrFail($id);
        if(file_exists($multiImg->photo_name)){
            unlink($multiImg->photo_name);
        }
        $multiImg->delete();
        $notification = array(
            'message' => 'Product Image Deleted Successfully!!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    } //Product's Multiple Image Delete Method Ends


    //Product's Status Update Method Starts
    public function updateProductStatus($id){
        $productStatus = Product::findOrFail($id);
        if($productStatus->status == 0){
            $productStatus->status = 1;
            $notification = array(
                'message' => 'Product Activated Successfully!!',
                'alert-type' => 'success'
            );
        }
        else {
            $productStatus->status = 0;
            $notification = array(
                'message' => 'Product Inactive Successfully!!',
                'alert-type' => 'warning'
            );
        }
        $productStatus->save();
        return redirect()->back()->with($notification);

    } //Product's Status Update Method Ends

    //Product Delete Method Starts
    public function deleteProduct($id){
        $product = Product::findOrFail($id);
        if(file_exists($product->product_thumbnail)){
            unlink($product->product_thumbnail);
        }
        $product->delete();

        $multiImage = MultiImg::where('product_id',$id)->get();
        foreach($multiImage as $img){
            if(file_exists($img->photo_name)){
                unlink($img->photo_name);
            }
            $img->delete();
        }
        $notification = array(
            'message' => 'Product Deleted Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    } //Product Delete Method Ends

    //Product Details Method Starts
    public function detailsProduct($id){
        $product = Product::find($id);
        $multiImages = MultiImg::where('product_id',$id)->get();
        return view('admin-control.product.details_product', compact('product', 'multiImages'));
    } //Product Details Method Ends



































}
