<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ship_district;
use App\Models\Steate;
use Cart;

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
            $data['post_code'] = $request->post_code;
             $cartstotal    =  Cart::total();

            if ($request->payment_method == 'stripe') {
              return view('frontend.paymentmethod.stripe', compact('data','cartstotal'));
            }
            elseif($request->payment_method == 'cart'){
              return 'cart';

            }
            else{
               return 'handcash';
            }

    }
}