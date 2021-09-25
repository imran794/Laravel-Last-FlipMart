<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;

class ReviweController extends Controller
{
    public function Review()
    {
        $productreviews = Rating::with('user','product')->latest()->get();
        return view('admin.review.index',compact('productreviews'));
    }

    public function ReviewApprove($id)
    {
        Rating::findOrFail($id)->update(['status' => 'approve']);
        $notification=array(
            'message'=>'Review Approve',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function ReviewDelete($id)
    {
        Rating::findOrFail($id)->delete();
        $notification=array(
            'message'=>'Review Delete',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
