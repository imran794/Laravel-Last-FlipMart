<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Orderitem;
use Auth;
use Cart;
use Session;
use carbon\carbon;

class StripeController extends Controller
{
    public function store(Request $request)
    {
        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else {
            $total_amount = round(Cart::total());
        }
        
        \Stripe\Stripe::setApiKey('sk_test_51HWy6qKWTzRO2uRmsyr807nGerxKEfUISBQG4k08Dai44FHeGdEjcHKGc5qLAGf0ZtFq6TB6CoQXJuDgTz0PtSOi00iCqQ2ORt');
        $token = $_POST['stripeToken'];

        $charge = \Stripe\Charge::create([
          'amount' => $total_amount*100,
          'currency' => 'usd',
          'description' => 'Payment for Imran',
          'source' => $token,
          'metadata' => ['order_id' => uniqid()],
        ]);


      $orderid =  Order::insertGetId([
            'user_id'           => Auth::id(),
            'division_id'       => $request->division_id,
            'district_id'       => $request->district_id,
            'state_id'          => $request->state_id,
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'post_code'         => $request->post_code,
            'notes'             => $request->notes,
            'payment_type'      => 'Stripe',
            'payment_method'    => 'Stripe',
            'transaction_id'    => $charge->balance_transaction,
            'currency'          => $charge->currency,
            'amount'            => $total_amount,
            'order_number'      => $charge->metadata->order_id,
            'invoice_no'        => 'DUM'.mt_rand(10000000,99999999),
            'order_date'        => carbon::now()->format('d F Y'),
            'order_month'       => carbon::now()->format('F'),
            'order_year'        => carbon::now()->format('Y'),
            'order_month'       => carbon::now()->format('F'),
            'order_month'       => carbon::now()->format('F'),
            'status'            => 'pedding',
            'created_at'        => carbon::now(),
        ]);

        $carts = Cart::content();

        foreach ($carts as $cart) {
            Orderitem::insert([
                'order_id'      => $orderid,
                'product_id'      => $cart->id,
                'color'         => $cart->options->color,
                'size'          => $cart->options->size,
                'qty'          => $cart->qty,
                'price'          => $cart->price,
            ]);
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
