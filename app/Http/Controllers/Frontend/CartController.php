<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Wishlist;
use Gloudemans\Shoppingcart\Facades\Cart;
use Carbon\Carbon;
use Auth;

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


}
