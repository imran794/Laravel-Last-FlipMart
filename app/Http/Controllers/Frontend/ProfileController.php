<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Image;
use Hash;
Use App\Models\User;
use Carbon\Carbon;

class ProfileController extends Controller
{
    public function UdateProfile(Request $request)
   {
         $request->validate([
            'name'      => 'required',
            'email'      => 'required',
        ]);

        User::findOrFail(Auth::id())->update([
            'name'         => $request->name,
            'email'        => $request->email,
            'phone'        => $request->phone,
            'updated_at'   => Carbon::now(),
        ]);

        $notification=array(
            'message'=>' User Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function Image()
    {
        return view('user.image');
    }

    public function ImageUpdate(Request $request)
     {
            $old_image = $request->old_image;

        if (User::findOrFail(Auth::id())->image == 'uploads/media/avatar.png') {
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/media/'.$name_gen);
            $save_url = 'uploads/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        }else {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('uploads/media/'.$name_gen);
            $save_url = 'uploads/media/'.$name_gen;
            User::findOrFail(Auth::id())->Update([
                'image' => $save_url
            ]);
            $notification=array(
                'message'=>'Image Successfully Updated',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
    }

     public function ChangePassword()
    {
        return view('user.changepassword');
    }

       public function PasswordStore(Request $request)
    {

         $request->validate([
        'old_password' => 'required',
        'password'     => 'required|min:8',
        'password_confirmation' => 'required|min:8',
         ]);


         if ($request->old_password == $request->password) {
             $notification=array(
                    'message'=>'Your old Password Can not be a new Password',
                    'alert-type'=>'success'
                );
                return Redirect()->back()->with($notification);
             
         }
         else{
             
             $old_password = $request->old_password;
             $db_password = Auth::user()->password;
             if (Hash::check($old_password, $db_password)) {
                
                User::findOrFail(Auth::id())->update([
                    'password' => Hash::make($request->password)
                ]);
                 Auth::logout();
                  $notification=array(
                    'message'=>'Your Password Change Success. Now Login With New Password',
                    'alert-type'=>'success'
                );
                return Redirect()->route('login')->with($notification);
             }
             else{

                     $notification=array(
                    'message'=>'Old Password Not Match',
                    'alert-type'=>'success'
                      );
                    return Redirect()->back()->with($notification);

             }

         }

    


    }
}