<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class SliderController extends Controller
{
    public function getImageUrl($request){
        $image = $request->file('slider_img');
        $codeGen = hexdec(uniqid());
        $imageName = $image->getclientOriginalName();
        $imageFullName = $codeGen.'_'.$imageName;
        $directory = 'upload/slider-images/';
        Image::make($image)->resize(870,370)->save($directory.$imageFullName);
//        $image->move($directory, $imageFullName);
        return $directory.$imageFullName;
    }


    public function sliderView(){
        $sliders = Slider::latest()->get();
        return view('admin-control.slider.slider-view', compact('sliders'));
    }

    public function sliderCreate(Request $request){
        $request->validate([
            'slider_img' => 'required',
        ], [
             'slider_img.required' => 'You Must put an Image',
         ]);

        $slider = new Slider();
        $slider->slider_img  = $this->getImageUrl($request);
        $slider->title       = $request->title;
        $slider->description = $request->description;
        $slider->save();

        $notification = array(
            'message' => 'Slider Created Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function sliderEdit($id){
        $slider = Slider::findOrFail($id);
        return view('admin-control.slider.slider-edit', compact('slider'));
    }

    public function sliderUpdate(Request $request, $id){
        $slider = Slider::findOrFail($id);
        if($request->file('slider_img')){
            if(file_exists($slider->slider_img)){
                unlink($slider->slider_img);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else{
            $imageUrl = $slider->slider_img;
        }
        $slider->slider_img  = $imageUrl;
        $slider->title       = $request->title;
        $slider->description = $request->description;
        $slider->save();
        $notification = array(
            'message' => 'Slider Updated Successfully!!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.slider')->with($notification);
    }

    public function sliderDetails($id){
        $slider = Slider::findOrFail($id);
        return view('admin-control.slider.slider-details', compact('slider'));
    }

    public function updateSliderStatus($id){
        $sliderStatus = Slider::findOrFail($id);
        if($sliderStatus->status == 0){
            $sliderStatus->status = 1;
            $notification = array(
                'message' => 'Slider Activated Successfully!!',
                'alert-type' => 'success'
            );
        }
        else {
            $sliderStatus->status = 0;
            $notification = array(
                'message' => 'Slider Deactivated Successfully!!',
                'alert-type' => 'warning'
            );
        }
        $sliderStatus->save();
        return redirect()->back()->with($notification);

    }

    public function sliderDelete($id){
        $slider = Slider::findOrFail($id);
        if(file_exists($slider->slider_img)){
            unlink($slider->slider_img);
        }
        $slider->delete();
        $notification = array(
            'message' => 'Slider Deleted Successfully!!',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }









}
