<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function brandView(){
        $brands = Brand::latest()->get();
        return view('admin-control.brand.brand-view', compact('brands'));
    }

    public function brandCreate(Request $request){
        $request->validate([
            'brand_name_en'     => 'required',
            'brand_name_ban'    => 'required',
            'brand_name_image'  => 'required',
        ],
         [
            'brand_name_en.required' => 'Brand Name in English is Required',
            'brand_name_ban.required' => 'Brand Name in Bangla is Required',
            'brand_image.required' => 'Brand Image is Required',
        ]);

        return $request->all();

    }








}
