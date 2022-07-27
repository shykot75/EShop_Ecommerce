<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView(){
        $categories = Category::latest()->get();
        return view('admin-control.category.category-view', compact('categories'));
    }

    public function categoryCreate(Request $request){
        $request->validate([
            'category_name_en'     => 'required',
            'category_name_ban'    => 'required',
            'category_icon'  => 'required',
        ],
            [
                'category_name_en.required'    => 'Category Name in English is Required',
                'category_name_ban.required'   => 'Category Name in Bangla is Required',
                'category_icon.required'      => 'Category Icon is Required',
            ]);
        $category = new Category();
        $category->category_name_en   = $request->category_name_en;
        $category->category_name_ban  = $request->category_name_ban;
        $category->category_slug_en   = strtolower(str_replace(' ', '-',$request->category_name_en));
        $category->category_slug_ban  = strtolower(str_replace(' ', '-',$request->category_name_ban));
        $category->category_icon     = $request->category_icon;
        $category->save();
        $notification = array(
            'message' => 'Category Created Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function categoryEdit($id){
        $category = Category::find($id);
        return view('admin-control.category.category-edit', compact('category'));
    }

    public function categoryUpdate(Request $request, $id){
        $request->validate([
            'category_name_en'     => 'required',
            'category_name_ban'    => 'required',
            'category_icon'  => 'required',
        ],
            [
                'category_name_en.required'    => 'Category Name in English is Required',
                'category_name_ban.required'   => 'Category Name in Bangla is Required',
                'category_icon.required'      => 'Category Icon is Required',
            ]);

        $category = Category::find($id);
        $category->category_name_en   = $request->category_name_en;
        $category->category_name_ban  = $request->category_name_ban;
        $category->category_slug_en   = strtolower(str_replace(' ', '-',$request->category_name_en));
        $category->category_slug_ban  = strtolower(str_replace(' ', '-',$request->category_name_ban));
        $category->category_icon     = $request->category_icon;
        $category->save();
        $notification = array(
            'message' => 'Category Info Updated Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.category')->with($notification);
    }

    public function categoryDelete($id){
        $category = Category::find($id);
        $category->delete();
        $notification = array(
            'message' => 'Category Deleted Successfully!!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }









}
