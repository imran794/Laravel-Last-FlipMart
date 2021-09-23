<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SearchController extends Controller
{
    public function SearchProduct(Request $request)
    {
        $request->validate([
            'search'   => 'required'
        ]);

        $products = Product::where("product_name","LIKE","%".$request->search."%")->orwhere("product_tags","LIKE","LIKE".$request->search.'%')->orwhere("short_des","LIKE","%".$request->search."%")->paginate(1);
        return view('frontend.searchproduct',compact('products'));
    }

    public function findProducts(Request $request)
    {
        $request->validate([
            'search'   => 'required'
        ]);

        $products = Product::where("product_name","LIKE","%".$request->search."%")->orwhere("product_tags","LIKE","LIKE".$request->search.'%')->orwhere("short_des","LIKE","%".$request->search."%")->take(5)->get();
        return view('frontend.searchfind',compact('products'));
    }
}
