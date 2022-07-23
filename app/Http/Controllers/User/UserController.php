<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getImageUrl($request){
        $image = $request->file('profile_photo_path');
        $codeGen = hexdec(uniqid());
        $imageName = $image->getclientOriginalName();
        $imageFullName = $codeGen.'_'.$imageName;
        $directory = 'upload/user-images/';
        $image->move($directory, $imageFullName);
        return $directory.$imageFullName;
    }



    public function index(){
        return view('user.dashboard.dashboard');
    }

    public function userProfile(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.profile.user-profile', compact('user'));
    }

    public function userProfileUpdate(Request $request){
        $id = Auth::user()->id;
        $user = User::find($id);

        $validatedData = $request->validate([
            'name'      => 'required|max:255',
            'email'         => 'required',
            'phone'         => 'required|min:11|max:11',
        ],
            [
                'name.required'  => 'User Name is Required',
                'name.max'       => 'User Name should not more than 255 characters',
                'email.required' => 'User Email is Required',
                'phone.required' => 'User Phone NUmber is Required',
                'phone.min'      => 'Phone Number should not less than 11 characters',
                'phone.max'      => 'Phone Number should not more than 11 characters',
            ]);

        if($request->file('profile_photo_path')){
            if(file_exists($user->profile_photo_path)){
                unlink($user->profile_photo_path);
            }
            $imageUrl = $this->getImageUrl($request);
        }
        else {
            $imageUrl = $user->profile_photo_path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profile_photo_path = $imageUrl;
        $user->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully!!',
            'alert-type' => 'success'
        );
        return redirect()->route('dashboard')->with($notification);
    }

    public function userChangePassword(){
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('user.password.password-edit', compact('user'));
    }

    public function userUpdatePassword(Request $request){

//        $validateData = $request->validate([
//            'current_password' => 'required',
//            'new_password' => 'required|confirmed|min:8',
//            'confirm_password' => 'required',
//        ],
//         [
//            'current_password.required' => 'Current Password Should not Empty',
//            'new_password.required'     => 'You must enter a new Password',
//            'new_password.min'          => 'New Password should at least 8 Characters Long',
//            'confirm_password.required' => 'Confirm Password Should not Empty',
//        ]);

        $validateData = $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed|min:8',
        ],
           [
            'current_password.required' => 'Current Password Should not Empty',
            'password.required'     => 'You must enter a new Password',
            'password.confirmed'          => 'New Password and Confirm password should matched',
            'password.min'          => 'New Password Should at least 8 Characters Long',
        ]);


            $id = Auth::user()->id;
            $userPassword = User::find($id)->password;


        if(Hash::check($request->current_password,$userPassword)){
            $changePassword = User::find($id);
            $changePassword->password = Hash::make($request->password);
            $changePassword->save();
            route('logout');
            return redirect('/login');
        }
        else {
            $notification = array(
                'message' => 'Your Current Password Does Not Match With Database!',
                'alert-type' => 'error'
            );
            return redirect()->route('user.change.password')->with($notification);
        }

    }














}
