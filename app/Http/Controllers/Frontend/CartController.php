<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;

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
}
