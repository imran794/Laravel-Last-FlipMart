<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;
use Auth;
use Carbon\Carbon;
use PDF;

class AllOrdersController extends Controller
{
    public function penddingorder()
    {
        $orders = Order::where('status','pedding')->orderBy('id','DESC')->get();
        return view('order.pendding',compact('orders'));
    }

    public function OrderView($order_id)
    {
         $order = Order::with('division','district','state','user')->where('id',$order_id)->first();
         $orderItems = OrderItem::with('product')->where('order_id',$order_id)->orderBy('id','DESC')->get();
         return view('order.addorderview',compact('order','orderItems'));
    }

    public function ConfirmOrder()
    {
         $orders = Order::where('status','confirm')->orderBy('id','DESC')->get();
        return view('order.confirme',compact('orders'));
    }

       public function ProcessingOrder()
    {
         $orders = Order::where('status','processing')->orderBy('id','DESC')->get();
        return view('order.processing',compact('orders'));
    }


       public function PickedOrder()
    {
         $orders = Order::where('status','picked')->orderBy('id','DESC')->get();
        return view('order.picke',compact('orders'));
    }


       public function ShippedOrder()
    {
         $orders = Order::where('status','shipped')->orderBy('id','DESC')->get();
        return view('order.shipp',compact('orders'));
    }

       public function DeliveredOrder()
    {
         $orders = Order::where('status','delivered')->orderBy('id','DESC')->get();
        return view('order.delivered',compact('orders'));
    }

       public function CancelOrder()
    {
         $orders = Order::where('status','Cancel')->orderBy('id','DESC')->get();
        return view('order.cancel',compact('orders'));
    }

    // order status update

    public function PenddingToConfirm($id)
    {
          Order::findOrFail($id)->update([
            'status' => 'Confirm',
            'confirmed_date' => Carbon::now()
            ]);

           $notification=array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('confirm.order')->with($notification);
    }

    public function ConfirmToProcessing($id)
    {
         Order::findOrFail($id)->update([
            'status' => 'Processing',
            'processing_date' => Carbon::now()
            ]);

           $notification=array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('processing.order')->with($notification);
    }

    public function ProcessToPicked($id)
    {
         Order::findOrFail($id)->update([
            'status' => 'picked',
            'picked_date' => Carbon::now()
            ]);

           $notification=array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('picked.order')->with($notification);
    }
    public function PickedtoShipped($id)
    {
         Order::findOrFail($id)->update([
            'status' => 'Shipped',
            'shipped_date' => Carbon::now()
            ]);

           $notification=array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('shipped.order')->with($notification);
    }  
     public function ShippedToDelivery($id)
    {
         Order::findOrFail($id)->update([
            'status' => 'delivered',
            'delivered_date' => Carbon::now()
            ]);

           $notification=array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('delivered.order')->with($notification);
    } 

     public function PendingToCancel($id)
    {
         Order::findOrFail($id)->update([
            'status' => 'Cancel',
            'cancel_date' => Carbon::now()
            ]);

           $notification=array(
            'message'=>'Order Confirm Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('Cancel.order')->with($notification);
    }

    public function invoicedownload($id)
    {
         $order = Order::with('division','district','state','user')->where('id',$id)->first();
        $orderItems = Orderitem::where('order_id',$id)->orderBy('id','DESC')->get();
         $pdf = PDF::loadView('order.admininvoice',compact('order','orderItems'))->setPaper('a4','landscape')->setOptions([
            'tempDir'  => public_path(),
            'chroot'  => public_path(),
         ]);
         return $pdf->download('invoice.pdf');
    }

    public function OrdersDelete($id)
    {
         Order::findOrFail($id)->delete();
           $notification=array(
            'message'=>'Order Delete Success',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    
}
