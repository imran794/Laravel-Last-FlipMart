<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;
use App\Models\Order;

class ReportController extends Controller
{
    public function Index()
    {
        return view('admin.reports.index');
    }

    public function SearchByDate(Request $request)
    {
        $date = New DateTime($request->date);
        $formatDate = $date->format('d F Y');

        $orders = Order::where('order_date',$formatDate)->latest()->get();
        return view('admin.reports.report',compact('orders'));
    }

    public function SearchByMonth(Request $request)
    {
        $orders = Order::where('order_month',$request->month_name)->where('order_year',$request->year_name)->latest()->get();
        return view('admin.reports.report',compact('orders'));
    }

    public function SearchByYear(Request $request)
    {
        $orders = Order::where('order_year',$request->year)->latest()->get();
        return view('admin.reports.report',compact('orders'));
    }
}
