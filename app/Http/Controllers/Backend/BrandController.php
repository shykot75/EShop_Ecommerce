<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    public function getImageUrl($request){
        $image = $request->file('brand_image');
        $codeGen = hexdec(uniqid());
        $imageName = $image->getclientOriginalName();
        $imageFullName = $codeGen.'_'.$imageName;
        $directory = 'upload/brand-images/';
        Image::make($image)->resize(300,300)->save($directory.$imageFullName);
//        $image->move($directory, $imageFullName);
        return $directory.$imageFullName;
    }

    public function brandView(){
        $brands = Brand::all();
        return view('admin-control.brand.brand-view', compact('brands'));
    }

    public function brandCreate(Request $request){
        $request->validate([
            'brand_name_en'     => 'required',
            'brand_name_ban'    => 'required',
            'brand_image'  => 'required',
        ],
         [
            'brand_name_en.required'    => 'Brand Name in English is Required',
            'brand_name_ban.required'   => 'Brand Name in Bangla is Required',
            'brand_image.required'      => 'Brand Image is Required',
        ]);
        $brand = new Brand();
        $brand->brand_name_en   = $request->brand_name_en;
        $brand->brand_name_ban  = $request->brand_name_ban;
        $brand->brand_slug_en   = strtolower(str_replace(' ', '-',$request->brand_name_en));
        $brand->brand_slug_ban  = strtolower(str_replace(' ', '-',$request->brand_name_ban));
        $brand->brand_image     = $this->getImageUrl($request);
        $brand->save();
        $notification = array(
            'message' => 'Brand Created Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function brandEdit($id){
        $brand = Brand::find($id);
        return view('admin-control.brand.brand-edit', compact('brand'));
    }

    public function brandUpdate(Request $request, $id){
        $request->validate([
            'brand_name_en'     => 'required',
            'brand_name_ban'    => 'required',
        ],
            [
                'brand_name_en.required'    => 'Brand Name in English is Required',
                'brand_name_ban.required'   => 'Brand Name in Bangla is Required',
            ]);

        $brand = Brand::find($id);

        if($request->file('brand_image')){
            if(file_exists($brand->brand_image)){
                unlink($brand->brand_image);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else{
            $imageUrl = $brand->brand_image;
        }

        $brand->brand_name_en   = $request->brand_name_en;
        $brand->brand_name_ban  = $request->brand_name_ban;
        $brand->brand_slug_en   = strtolower(str_replace(' ', '-',$request->brand_name_en));
        $brand->brand_slug_ban  = strtolower(str_replace(' ', '-',$request->brand_name_ban));
        $brand->brand_image     = $imageUrl;
        $brand->save();
        $notification = array(
            'message' => 'Brand Info Updated Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.brand')->with($notification);
    }

    public function brandDelete($id){
        $brand = Brand::find($id);
        if(file_exists($brand->brand_image)){
            unlink($brand->brand_image);
        }
        $brand->delete();
        $notification = array(
            'message' => 'Brand Deleted Successfully!!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }










}
