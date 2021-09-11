<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;
use Auth;
use PDF;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function myorder()
    {
        $orders = Order::where('user_id',Auth::id())->latest()->get();
        return view('order.allorder',compact('orders'));
    }

    public function orderview($id)
    {
        $order = Order::with('division','district','state','user')->where('id',$id)->where('user_id',Auth::id())->first();
        $orderItems = Orderitem::where('order_id',$id)->orderBy('id','DESC')->get();
         return view('order.orderview',compact('order','orderItems'));
    }

    public function invoicedownload($id)
    {
        $order = Order::with('division','district','state','user')->where('id',$id)->where('user_id',Auth::id())->first();
        $orderItems = Orderitem::where('order_id',$id)->orderBy('id','DESC')->get();
         $pdf = PDF::loadView('order.invoice',compact('order','orderItems'))->setPaper('a4','landscape')->setOptions([
            'tempDir'  => public_path(),
            'chroot'  => public_path(),
         ]);
         return $pdf->download('invoice.pdf');
    }

    public function ReturnOrder(Request $request)
    {
         $id = $request->id;

         Order::findOrFail($id)->update([
             'return_date' => Carbon::now()->format('d F Y'),
             'return_reason'  => $request->return_reason,
         ]);
           $notification=array(
            'message'=>'Return Request Send Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('my-order')->with($notification);
    }
}
