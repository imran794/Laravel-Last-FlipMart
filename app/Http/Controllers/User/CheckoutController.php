<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\orderMail;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ship_district;
use App\Models\Steate;
use App\Models\Order;
use App\Models\Orderitem;
use App\Models\Product;
use Cart;
use Session;
use Auth;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    public function DistrictGet($division_id)
    {
       $ship = ship_district::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
       json_encode($ship);
    }

    public function checkoutstore(Request $request)
    {
            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['post_code'] = $request->post_code;
            $data['notes'] = $request->notes;
            $data['division_name'] = $request->division_name;
            $data['district_name'] = $request->district_name;
            $data['state_name'] = $request->state_name;
            $cartstotal    =  Cart::total();
            $carts        =  Cart::content();
            $cartsqty      =  Cart::count();
              if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else {
            $total_amount = round(Cart::total());
        }

            if ($request->payment_method === 'stripe') {
              return view('frontend.paymentmethod.stripe', compact('data','cartstotal'));
            }
            elseif($request->payment_method == 'sslHost'){
              return view('frontend.paymentmethod.sslhost', compact('data','total_amount','carts','cartsqty'));
            }

            elseif($request->payment_method == 'sslEasy'){
              return view('frontend.paymentmethod.sslEasy', compact('data','total_amount','carts','cartsqty'));

            }

             elseif($request->payment_method == 'handcash'){
               
              $orderid =  Order::insertGetId([
                 'user_id'          => Auth::id(),
                 'name'              => $request->name,
                 'email'             => $request->email,
                 'phone'             => $request->phone,
                 'post_code'         => $request->post_code,
                 'amount'            => $total_amount,
                 'status'            => 'Pending',
                 'division_name'     => $request->division_name,
                 'district_name'     => $request->district_name,
                 'state_name'        => $request->state_name,
                 'notes'             => $request->notes,
                 'invoice_no'        => 'DUM'.mt_rand(10000000,99999999),
                 'payment_method'    => 'handcash',
                 'payment_type'      => 'handcash',
                 'transaction_id'    => 'transaction_id',
                 'order_number'      => 'order_number',
                 'currency'          => 'tk',
                 'order_date'        => Carbon::now()->format('d F Y'),
                 'order_month'       => Carbon::now()->format('F'),
                 'order_year'        => Carbon::now()->format('Y'),
                 'created_at'        => Carbon::now(),
               ]);

// start send mail

      // $invoice = Order::findOrFail($orderid);

      // $data = [

      //   'invoice_no'  => $invoice->invoice_no,
      //   'amount'      => $total_amount,
      //   'created_at'  => carbon::now(),

      // ];

       // Mail::to($request->email)->send(new OrderMail($data));

// End send mail


        $carts = Cart::content();

        foreach ($carts as $cart) {
            Orderitem::insert([
                'order_id'        => $orderid,
                'product_id'      => $cart->id,
                'color'           => $cart->options->color,
                'size'            => $cart->options->size,
                'qty'             => $cart->qty,
                'price'           => $cart->price,
            ]);
        }

        // product stock 

        foreach($carts as $procart){
            Product::where('id',$procart->id)->decrement('product_qty',$procart->qty);

        }

        if (Session::has('coupon')) {
              Session::forget('coupon');
        }

       Cart::destroy();

             $notification=array(
            'message'=>'Order Place successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('user.dashboard')->with($notification);


            }

    }
}
