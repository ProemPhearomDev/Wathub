<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Monk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    //
    // public function index(){
    //     return view('Frontend-Layout.index');
    // }

    public function UserLogout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function UserRegister(){
        return redirect()->route('register');
    }
    // // UserLoginbackfromRegister
    // public function UserLoginbackfromRegister(){
    //     return redirect()->route('register');
    // }
    // UserProfile
    public function UserProfile(){
        // $id = Auth::user()->id;
        // $user = User::find($id);
        $user = User::find(Auth::user()->id);
        
        return view('Frontend-Layout.profile.user_profile_view', compact('user'));
    }
    public function UserProfileStore(Request $request)
    {
        $dataUser = User::find(Auth::user()->id);
        $dataUser->name = $request->name;
        $dataUser->email = $request->email;
        $dataUser->phone = $request->phone;
        // Save data
        if ($request->file('profile_photo_path')) {
            // remove old image if have
            @unlink(public_path('upload/user_img/' . $dataUser->profile_photo_path));
            $file = $request->file('profile_photo_path');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_img'), $filename);
            $dataUser['profile_photo_path'] = $filename;
        }
        $dataUser->save();

        //alert toast msg
        $notification = array(
            'message' => "User Profile Updated Successfully",
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
     //update data
     public function UserUpdatePassword(Request $request){
        //array  Validate  password
        $validateData = $request->validate([ 
            'oldpassword' => 'required',
            'password' => 'required | confirmed' // the same password and conform it's standard laravel 
        ]);

        $hashedPassword = Auth::user()->password; //$h old password
        if(Hash::check($request->oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();

        //  return redirect()->route('dashboard');
         return redirect()->route('user.logout');
         //alert toast msg
        $notification = array(
            'message' => "User Updated Password Successfully",
            'alert-type' => 'success'
        );
       
        }
        else{ 
        
            return redirect()->back();
         //alert toast msg
         $notification = array(
            'message' => "User Updated Password Unsuccessfully",
            'alert-type' => 'danger'
        );
           
        }
    }
  
}
