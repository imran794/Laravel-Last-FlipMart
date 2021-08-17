<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ShipDivision;
use App\Models\ship_district;
use App\Models\Steate;
use Carbon\Carbon;

class ShipingAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.division.index',[
            'divisions'    => ShipDivision::latest()->get()
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
            'division_name'      => 'required|unique:ship_divisions,division_name',
        ]);

        ShipDivision::insert([
            'division_name' => strtoupper($request->division_name),
            'created_at'    => carbon::now()
        ]);

          $notification=array(
            'message'=>'ShipDivision Insert successfully',
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
        return view('admin.division.edit',[
            'edit_data' => ShipDivision::findOrFail($id),
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
          'division_name'              => 'required|unique:ship_divisions,division_name',
        ]);

        ShipDivision::findOrFail($id)->update([
            'division_name' => $request->division_name,
            'updated_at'       => carbon::now()
        ]); 

          $notification=array(
            'message'=>'ShipDivision Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('shipingarea.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         ShipDivision::findOrFail($id)->delete();
          $notification=array(
            'message'=>'ShipDivision Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }


    // district

    public function shipdistrictindex()
    {
         return view('admin.distinct.index',[
            'distincts'    => ship_district::latest()->get(),
            'divisions'    => ShipDivision::latest()->get()
        ]);
    }

    public function distinctstore(Request $request)
    {
        $request->validate([
            'division_id'    => 'required',
            'district_name'  => 'required|unique:ship_districts,district_name',
        ]);

        ship_district::insert([
            'division_id'    => $request->division_id,
            'district_name'  => strtoupper($request->district_name),
            'created_at'     => carbon::now()
        ]);

          $notification=array(
            'message'=>'District Insert successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function distinctdestroy($id)
    {
        ship_district::findOrFail($id)->delete();
          $notification=array(
            'message'=>'District Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function distinctedit($id)
    {
        return view('admin.distinct.edit',[
            'divisions'    => ShipDivision::latest()->get(),
            'edit_data' => ship_district::findOrFail($id),
             ]);
    }

    public function distinctupdate(Request $request, $id)
     {
        $request->validate([
            'division_id'    => 'required',
            'district_name'  => 'required|unique:ship_districts,district_name',
        ]);

        ship_district::findOrFail($id)->update([
            'division_id'   => $request->division_id,
            'district_name' => $request->district_name,
            'updated_at'       => carbon::now()
        ]); 

          $notification=array(
            'message'=>' District Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('shipdistrict.index')->with($notification);
    }

    // state

    public function stateindex()
    {
        
            return view('admin.state.index',[
               'Steates' => Steate::latest()->get(),
                'divisions'    => ShipDivision::latest()->get()
             ]);
    }

    public function getajax($division_id)
    {
           $ship = ship_district::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
           return json_encode($ship);
    }

    public function statestore(Request $request)
     {
        $request->validate([
            'division_id'    => 'required',
            'district_id'  => 'required',
            'state_name'  => 'required',
        ]);

        Steate::insert([
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'state_name'    => $request->state_name,
            'created_at'    => carbon::now()
        ]); 

          $notification=array(
            'message'=>' Steate insert successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function statedestroy($id)
    {
         Steate::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Steate Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

      public function stateedit($id)
    {
        return view('admin.state.edit',[
            'divisions'    => ShipDivision::latest()->get(),
            'edit_data' => Steate::findOrFail($id),
             ]);
    }

    public function stateupdate(Request $request, $id)
     {
        $request->validate([
            'division_id'    => 'required',
            'district_id'  => 'required',
            'state_name'  => 'required',
        ]);

        Steate::findOrFail($id)->update([
            'division_id'   => $request->division_id,
            'district_id'   => $request->district_id,
            'state_name'    => $request->state_name,
            'updated_at'       => carbon::now()
        ]); 

          $notification=array(
            'message'=>' Steate Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('state.index')->with($notification);
    }
}
