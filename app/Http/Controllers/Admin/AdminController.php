<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.ad.home');
    }

    public function AddUser()
    {
    
        return view('admin.adduser.index',[
                'roles' => Role::latest()->get(),
                'users' => User::where('roled_id','!=',2)->get(),
        ]);
    }

    public function UserStore(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4|confirmed',
            'roled_id' => 'required|numeric',
        ]);

        $request['password'] = Hash::make($request->password);
        User::create($request->all());
            $notification=array(
            'message'=>' User Create successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
        
    }

    public function UserDelete($id)
    {
        User::findOrFail($id)->delete();
             $notification=array(
            'message'=>' User Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
