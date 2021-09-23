<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rating;
use Auth;
use Carbon\Carbon;

class RatingController extends Controller
{
    public function ReviewCreate($product_id)
    {
        $id = $product_id;
        return view('order.review',compact('id'));
    }

    public function ReviweStrore(Request $request)
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);

        Rating::insert([
            'user_id'  => Auth::id(),
            'product_id'  => $request->product_id,
            'comment'     => $request->comment,
            'rating'      => $request->rating,
            'created_at'  => carbon::now()
        ]);

      $notification=array(
            'message'=>'Review Create Successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
