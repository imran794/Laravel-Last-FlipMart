<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;

class TrackController extends Controller
{
    public function OrderTrack(Request $request)
    {
         $order = Order::with('division','district','state','user')->where('invoice_no',$request->invoice_no)->first();
         if ($order) {
                $orderItems = Orderitem::where('order_id',$order->id)->orderBy('id','DESC')->get();
            return view('frontend.ordertrack',compact('order','orderItems'));
         }
         else{
               $notification=array(
                'message'=>'Order Not Found',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
         }

     
    }
}
