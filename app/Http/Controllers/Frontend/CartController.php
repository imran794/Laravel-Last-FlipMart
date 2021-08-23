<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ShipDivision;
use App\Models\Wishlist;
use App\Models\Coupon;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Auth;
use Session;

class CartController extends Controller
{
      public function cartdatastore(Request $request,$id)
    {
       $product = Product::findOrFail($id);
 
        if ($product->discount_price == null) {
           Cart::add(['id' => $id,
         'name' => $request->name,
         'qty' => $request->qty, 
         'price' => $product->selling_price, 
         'weight' => 1, 
         'options' => [
              'image' => $product->product_thambnail,
              'color' => $request->color,
              'size' => $request->size,
          ],
       ]);
        return response()->json(['success' => 'Sucessfully Added On Your Cart']);
        }

        else{
            Cart::add(['id' => $id,
          'name' => $request->name,
         'qty' => $request->qty, 
         'price' => $product->discount_price, 
         'weight' => 1, 
         'options' => [
              'image' => $product->product_thambnail,
              'color' => $request->color,
              'size' => $request->size,
          ],
         ]);
            return response()->json(['success' => 'Sucessfully Added On Your Cart']);
        }

    }

    public function minicart()
    {
       $carts        =  Cart::content();
       $cartsqty     =  Cart::count();
       $cartstotal   =  Cart::total();
         return response()->json(array(
            'carts'        => $carts,
            'cartsqty'     => $cartsqty,
            'cartstotal'  => $cartstotal
        ));
    }

    public function minicartremove($id)
    {
       Cart::remove($id);
       return response()->json(['success' => 'Sucessfully Remove On Your Cart']);

    }

    // wishlist

    public function addtowishlist(Request $request,$product_id)
    {
       if (Auth::check()) {
         $exisit = Wishlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();
          if (!$exisit) {
              Wishlist::insert([
            'user_id'          => Auth::id(),
            'product_id'       => $product_id,
            'created_at'       => Carbon::now()
           ]);
            return response()->json(['success' => 'Wishlist Added successfully']);
          }
          else{
                 return response()->json(['error' => 'The Product Has Already On Your Wishlist']);
          }
       }
       else{
              return response()->json(['error' => 'At First Login Your Account']);
       }
    }



    // cart page 

     public function create()
    {
            return view('frontend.cartpage');
    }

    public function getcartproduct()
    {
        $carts        =  Cart::content();
       $cartsqty      =  Cart::count();
       $cartstotal    =  Cart::total();
         return response()->json(array(
            'carts'        => $carts,
            'cartsqty'     => $cartsqty,
            'cartstotal'  => round($cartstotal)
        ));
    }

    public function Cartremove($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon')) {
                Session::forget('coupon');
            }
        return response()->json(['success' => 'Cart Remove Successfully']);
    }

    public function Cartdecrement($rowId)
    {
        $cart = Cart::get($rowId);
        if ($cart->qty == 1) {
           return response()->json('not decrement');
        } 
        else {
           Cart::update($rowId, $cart->qty - 1);
             if (Session::has('coupon')) {
                $coupon_name = Session::get('coupon')['coupon_name'];
                $coupon = Coupon::where('coupon_name',$coupon_name)->first();
                Session::put('coupon',[
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                    'total_amount' => round( Cart::total() - Cart::total() * $coupon->coupon_discount/100)
                ]);
            }
            return response()->json(['success' => 'Cart Decrement Successfully']);
        }
        

       
    } 
     public function cartincrement($rowId)
    {
        $cart = Cart::get($rowId);

        Cart::update($rowId, $cart->qty + 1);
          if (Session::has('coupon')) {
                $coupon_name = Session::get('coupon')['coupon_name'];
                $coupon = Coupon::where('coupon_name',$coupon_name)->first();
                Session::put('coupon',[
                    'coupon_name' => $coupon->coupon_name,
                    'coupon_discount' => $coupon->coupon_discount,
                    'discount_amount' => round(Cart::total() * $coupon->coupon_discount/100),
                    'total_amount' => round( Cart::total() - Cart::total() * $coupon->coupon_discount/100)
                ]);
            }
        return response()->json(['success' => 'Cart Increment Successfully']);
    }

    // coupon apply

    public function couponapply(Request  $request)
    {
        $coupon = Coupon::where('coupon_name',$request->coupon_name)->where('coupon_validity','>=',Carbon::now()->format('Y-m-d'))->where('status',1)->first();

        if ($coupon) {
            Session::put('coupon',[
                'coupon_name'        => $coupon->coupon_name,
                'coupon_discount'    => $coupon->coupon_discount,
                'discount_amount'    => round(Cart::total() * $coupon->coupon_discount / 100),
                'total_amount'       => round(Cart::total() - Cart::total() *$coupon->coupon_discount / 100)
            ]);
                return response()->json(array(
                'validity' => true,
                'success' => 'Coupon Applied Success'
            ));

        } else {
           return response()->json(['error' => 'Invalid Coupon']);
        }
        
    }

    public function couponcalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
               'subtotal'        =>  Cart::total(),
               'coupon_name'     =>  Session()->get('coupon')['coupon_name'],
               'coupon_discount' => Session::get('coupon')['coupon_discount'],
               'discount_amount' => Session::get('coupon')['discount_amount'],
               'total_amount'    => Session::get('coupon')['total_amount']

            ));
        } else {
            return response()->json(array(
               'total'        =>  Cart::total(),
            ));
        }
        
    }

    //remove coupon
    public function removeCoupon(){
        Session::forget('coupon');
        return response()->json(['success' => 'Coupon Remove Success']);
    }

    // checkout 

    public function checkout()
    {
        if (Auth::check()) {
            if (Cart::total() > 0) {
                   $carts        =  Cart::content();
                   $cartsqty      =  Cart::count();
                   $cartstotal    =  Cart::total();
                   $divisions       = ShipDivision::latest()->get();
                return view('frontend.checkout',compact('carts','cartsqty','cartstotal','divisions'));
            } else {
               $notification=array(
            'message'=>'Shopping First',
            'alert-type'=>'error'
        );
        return Redirect()->to('/')->with($notification);
            }
            
        } else {
              $notification=array(
            'message'=>'You Need To Login First',
            'alert-type'=>'error'
        );
        return Redirect()->route('login')->with($notification);
        }
        
    }


}


   