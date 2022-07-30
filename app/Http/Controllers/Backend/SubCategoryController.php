<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subcategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('admin-control.subcategory.subcategory-view', compact('categories','subcategories'));
    }

    public function subcategoryCreate(Request $request){
        $request->validate([
            'category_id'  => 'required',
            'subcategory_name_en'     => 'required',
            'subcategory_name_ban'    => 'required',
        ],
            [
                'category_id.required'      => 'Select Any Category',
                'subcategory_name_en.required'    => 'SubCategory Name in English is Required',
                'subcategory_name_ban.required'   => 'SubCategory Name in Bangla is Required',
            ]);
        $subcategory = new SubCategory();
        $subcategory->category_id           = $request->category_id;
        $subcategory->subcategory_name_en   = $request->subcategory_name_en;
        $subcategory->subcategory_name_ban  = $request->subcategory_name_ban;
        $subcategory->subcategory_slug_en   = strtolower(str_replace(' ', '-',$request->subcategory_name_en));
        $subcategory->subcategory_slug_ban  = strtolower(str_replace(' ', '-',$request->subcategory_name_ban));

        $subcategory->save();
        $notification = array(
            'message' => 'SubCategory Created Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subcategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategory = SubCategory::find($id);
        return view('admin-control.subcategory.subcategory-edit', compact('categories','subcategory'));
    }

    public function subcategoryUpdate(Request $request, $id){
        $request->validate([
            'category_id'  => 'required',
            'subcategory_name_en'     => 'required',
            'subcategory_name_ban'    => 'required',
        ],
            [
                'category_id.required'      => 'Select Any Category',
                'subcategory_name_en.required'    => 'SubCategory Name in English is Required',
                'subcategory_name_ban.required'   => 'SubCategory Name in Bangla is Required',
            ]);
        $subcategory = SubCategory::find($id);
        $subcategory->category_id           = $request->category_id;
        $subcategory->subcategory_name_en   = $request->subcategory_name_en;
        $subcategory->subcategory_name_ban  = $request->subcategory_name_ban;
        $subcategory->subcategory_slug_en   = strtolower(str_replace(' ', '-',$request->subcategory_name_en));
        $subcategory->subcategory_slug_ban  = strtolower(str_replace(' ', '-',$request->subcategory_name_ban));

        $subcategory->save();
        $notification = array(
            'message' => 'SubCategory Updated Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notification);
    }

    public function subcategoryDelete($id){
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        $notification = array(
            'message' => 'SubCategory Deleted Successfully!!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }

//---------------------------------------------------------------------------------------------
//------------------------------------- SUB SUB CATEGORY ---------------------------------------
//----------------------------------------------------------------------------------------------

    public function subSubcategoryView(){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subSubCategories = SubSubCategory::latest()->get();
        return view('admin-control.sub_subcategory.sub_subcategory-view', compact('categories','subSubCategories'));
    }

    public function subCategoryFetch($category_id){
        $subCategoryFetch = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en', 'ASC')->get();
        return json_encode($subCategoryFetch);
    }

    public function subSubCategoryFetch($subcategory_id){
        $subSubCategoryFetch = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en', 'ASC')->get();
        return json_encode($subSubCategoryFetch);
    }


    public function subSubcategoryCreate(Request $request){
        $request->validate([
            'category_id'  => 'required',
            'subcategory_id'  => 'required',
            'subsubcategory_name_en'     => 'required',
            'subsubcategory_name_ban'    => 'required',
        ],
            [
                'category_id.required'      => 'Select Any Category',
                'subcategory_id.required'      => 'Select Any Sub Category',
                'subsubcategory_name_en.required'    => 'Sub SubCategory Name in English Required',
                'subsubcategory_name_ban.required'   => 'Sub SubCategory Name in Bangla Required',
            ]);
        $subSubCategory = new SubSubCategory();
        $subSubCategory->category_id           = $request->category_id;
        $subSubCategory->subcategory_id           = $request->subcategory_id;
        $subSubCategory->subsubcategory_name_en   = $request->subsubcategory_name_en;
        $subSubCategory->subsubcategory_name_ban  = $request->subsubcategory_name_ban;
        $subSubCategory->subsubcategory_slug_en   = strtolower(str_replace(' ', '-',$request->subsubcategory_name_en));
        $subSubCategory->subsubcategory_slug_ban  = strtolower(str_replace(' ', '-',$request->subsubcategory_name_ban));

        $subSubCategory->save();
        $notification = array(
            'message' => 'Sub SubCategory Created Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function subSubcategoryEdit($id){
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::orderBy('subcategory_name_en', 'ASC')->get();
        $subSubCategory = SubSubCategory::findOrFail($id);
        return view('admin-control.sub_subcategory.sub_subcategory-edit', compact('categories','subcategories', 'subSubCategory'));
    }

    public function subSubcategoryUpdate(Request $request, $id){
        $request->validate([
            'category_id'  => 'required',
            'subcategory_id'  => 'required',
            'subsubcategory_name_en'     => 'required',
            'subsubcategory_name_ban'    => 'required',
        ],
            [
                'category_id.required'      => 'Select Any Category',
                'subcategory_id.required'      => 'Select Any Sub Category',
                'subsubcategory_name_en.required'    => 'Sub SubCategory Name in English Required',
                'subsubcategory_name_ban.required'   => 'Sub SubCategory Name in Bangla Required',
            ]);
        $subSubCategory = SubSubCategory::findOrFail($id);
        $subSubCategory->category_id           = $request->category_id;
        $subSubCategory->subcategory_id           = $request->subcategory_id;
        $subSubCategory->subsubcategory_name_en   = $request->subsubcategory_name_en;
        $subSubCategory->subsubcategory_name_ban  = $request->subsubcategory_name_ban;
        $subSubCategory->subsubcategory_slug_en   = strtolower(str_replace(' ', '-',$request->subsubcategory_name_en));
        $subSubCategory->subsubcategory_slug_ban  = strtolower(str_replace(' ', '-',$request->subsubcategory_name_ban));

        $subSubCategory->save();
        $notification = array(
            'message' => 'Sub SubCategory Updated Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.sub-subcategory')->with($notification);
    }

    public function subSubcategoryDelete($id){
        $subSubCategory = SubSubCategory::find($id);
        $subSubCategory->delete();
        $notification = array(
            'message' => 'Sub SubCategory Deleted Successfully!!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }









}
