<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AllOrdersController extends Controller
{
    public function penddingorder()
    {
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('order.pendding',compact('orders'));
    }
}
