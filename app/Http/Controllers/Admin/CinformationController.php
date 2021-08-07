<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cinformation;;
use Carbon\Carbon;

class CinformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('admin.cinformation.index',[
            'cinformations'       => Cinformation::latest()->get()
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
            'address'              => 'required',
            'number'               => 'required',
            'number2'              => 'required',
            'email'                => 'required',
        ]); 

        Cinformation::insert([
            'address'          => $request->address,
            'number'           => $request->number,
            'number2'          => $request->number2,
            'email'            => $request->email,
            'created_at'       => carbon::now()
        ]);

          $notification=array(
            'message'=>'Contact Information Insert successfully',
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
               return view('admin.cinformation.edit',[
              'edit_data' => Cinformation::findOrFail($id),
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
            'address'              => 'required',
            'number'               => 'required',
            'number2'              => 'required',
            'email'                => 'required',
        ]);

        Cinformation::findOrFail($id)->update([
            'address'          => $request->address,
            'number'           => $request->number,
            'number2'          => $request->number2,
            'email'            => $request->email,
            'updated_at'       => carbon::now()
        ]); 

          $notification=array(
            'message'=>'Contact Information  Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('cinformation.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {

        Cinformation::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Contact Information Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function inforinactive($id)
    {
        Cinformation::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Cinformation Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function inforactive($id)
    {
        Cinformation::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Cinformation Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

}
