<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coupon;
use Carbon\Carbon;
use Auth;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.coupon.index',[
            'coupons'    => Coupon::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'coupon_name'              => 'required|unique:coupons,coupon_name',
            'coupon_discount'          => 'required|numeric',
            'coupon_validity'          => 'required',
        ]);

        Coupon::insert([
            'coupon_name'           => strtoupper($request->coupon_name),
            'coupon_discount'       => $request->coupon_discount,
            'coupon_validity'       => $request->coupon_validity,
            'created_at'            => carbon::now()
        ]);

          $notification=array(
            'message'=>'Coupon Insert successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
           return view('admin.coupon.edit',[
             'edit_data' => Coupon::findOrFail($id),
             ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'coupon_name'              => 'required',
            'coupon_discount'          => 'required',
            'coupon_validity'          => 'required',
        ]);

        Coupon::findOrFail($id)->update([
            'coupon_name'           => $request->coupon_name,
            'coupon_discount'       => $request->coupon_discount,
            'coupon_validity'       => $request->coupon_validity,
            'updated_at'               => carbon::now()
        ]);

          $notification=array(
            'message'=>'Coupon Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('coupon.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {

        Coupon::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Coupon Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function couponinactive($id)
    {
        Coupon::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Coupon Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function couponactive($id)
    {
        Coupon::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Coupon Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
