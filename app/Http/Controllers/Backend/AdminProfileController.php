<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function getImageUrl($request){
        $image = $request->file('profile_photo_path');
        $codeGen = hexdec(uniqid());
        $imageName = $image->getclientOriginalName();
        $imageFullName = $codeGen.'_'.$imageName;
        $directory = 'upload/admin-images/';
        $image->move($directory, $imageFullName);
        return $directory.$imageFullName;
    }

    public function adminProfile($id){
        $adminProfile = Admin::find($id);
        return view('admin.profile.profile', compact('adminProfile'));
    }

    public function adminProfileEdit($id){
        $editProfile = Admin::find($id);
        return view('admin.profile.edit', compact('editProfile'));
    }

    public function adminProfileUpdate(Request $request, $id){
        $updateProfile = Admin::find($id);

        if($request->file('profile_photo_path')){
            if(file_exists($updateProfile->profile_photo_path)){
                unlink($updateProfile->profile_photo_path);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else {
            $imageUrl = $updateProfile->profile_photo_path;
        }
        $updateProfile->name = $request->name;
        $updateProfile->email = $request->email;
        $updateProfile->profile_photo_path = $imageUrl;
        $updateProfile->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully!!',
            'alert-type' => 'success'
        );
        return redirect('admin/profile/'.$id)->with($notification);
    }

    public function passwordChange($id){
        $changePassword = Admin::find($id);
        return view('admin.profile.password.password-edit', compact('changePassword'));
    }

    public function passwordUpdate(Request $request, $id){
        $validateData = $request->validate([
            'new_password' => 'min:8',
        ], [
            'new_password' => 'New Password Should At least 8 Characters Long',
        ]);

        $adminPassword = Admin::find($id)->password;
        if(Hash::check($request->current_password,$adminPassword)){
            $changePassword = Admin::find($id);
            $changePassword->password = Hash::make($request->new_password);
            $changePassword->save();
            Auth::logout();
            return redirect('/admin/login');
        }
        else {
            $notification = array(
                'message' => 'Your Current Password Does Not Match With Database!',
                'alert-type' => 'error'
            );
            return redirect('admin/password-change/'.$id)->with($notification);
        }

    }











}
