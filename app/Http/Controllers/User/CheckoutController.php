<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ship_district;
use App\Models\Steate;
use Cart;
use Session;

class CheckoutController extends Controller
{
    public function getajax($division_id)
    {
          $ship = ship_district::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
           return json_encode($ship);
    }
    public function getajaxjstate($district_id)
    {
          $ship = Steate::where('district_id',$district_id)->orderBy('state_name','ASC')->get();
           return json_encode($ship);
    }

    public function checkoutstore(Request $request)
    {

            $data = array();
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['phone'] = $request->phone;
            $data['post_code'] = $request->post_code;
            $data['notes'] = $request->notes;
            $data['division_id'] = $request->division_id;
            $data['district_id'] = $request->district_id;
            $data['state_id'] = $request->state_id;
            $cartstotal    =  Cart::total();
            $carts        =  Cart::content();
            $cartsqty      =  Cart::count();
              if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        }else {
            $total_amount = round(Cart::total());
        }

            if ($request->payment_method == 'stripe') {
              return view('frontend.paymentmethod.stripe', compact('data','cartstotal'));
            }
            elseif($request->payment_method == 'sslHost'){
              return view('frontend.paymentmethod.sslhost', compact('data','total_amount','carts','cartsqty'));
            }

            elseif($request->payment_method == 'sslEasy'){
              return view('frontend.paymentmethod.sslEasy', compact('data','total_amount','carts','cartsqty'));

            }
            else{
               return 'handcash';
            }

    }
}
