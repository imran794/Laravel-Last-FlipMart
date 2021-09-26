<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class StockController extends Controller
{
    public function Index()
    {
        $products = Product::latest()->get();
        return view('admin.stock.index',compact('products'));
    }

    public function StockEdit($id)
    {
       $products =  Product::findOrFail($id);
          return view('admin.stock.edit',compact('products'));
    }

    public function StockUpdate(Request $request, $id)
    {
        Product::findOrFail($id)->update(['product_qty' => $request->product_qty]);
        
        $notification=array(
            'message'=>'Stock Update Success',
            'alert-type'=>'success'
        );
        return Redirect()->route('stock.management')->with($notification);
    }
}
