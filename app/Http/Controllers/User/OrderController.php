<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;
use Auth;
use PDF;

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
}
