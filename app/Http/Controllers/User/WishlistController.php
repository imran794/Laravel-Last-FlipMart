<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\Wishlist;

class WishlistController extends Controller
{
    public function create()
    {
    	return view('frontend.wishlist');
    }

    public function showwishlist()
    {
    	$wishlist = Wishlist::with('product')->where('user_id',Auth::id())->latest()->get();
    	return response()->json($wishlist);
        
    }

    public function wishlistremove($id)
    {
        Wishlist::where('user_id', Auth::id())->where('id',$id)->delete();
       return response()->json(['success' => 'Sucessfully Remove On Your Wishlist']);
    }
}
