<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Carbon\Carbon;
use Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.brand.index',[
            'brands'    => Brand::latest()->get()
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
            'brand_name'              => 'required',
            'brand_image'             => 'required',
        ]);

            $image = $request->file('brand_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save('uploads/brandimage/'.$name_gen);
            $save_url = 'uploads/brandimage/'.$name_gen;

        Brand::insert([
            'brand_name'           => $request->brand_name,
            'brand_image'          => $save_url,
            'created_at'           => carbon::now()
        ]);

          $notification=array(
            'message'=>'Brnad Insert successfully',
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
          return view('admin.brand.edit',[
            'edit_data' => Brand::findOrFail($id),
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
        $old_image = $request->old_image;

        $request->validate([
            'brand_name'              => 'required',
        ]);


        if ($request->file('brand_image')) {
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,600)->save('uploads/brandimage/'.$name_gen);
            $save_urlup = 'uploads/brandimage/'.$name_gen;

            Brand::findOrFail($id)->update([
            'brand_name'           => $request->brand_name,
            'brand_image'          => $save_urlup,
            'updated_at'           => carbon::now()
        ]);

          $notification=array(
            'message'=>'Brand Update successfully',
            'alert-type'=>'success'
        );
       return Redirect()->route('brand.index')->with($notification);    

        }

        else{

           Brand::findOrFail($id)->update([
            'brand_name'           => $request->brand_name,
            'updated_at'        => carbon::now()
        ]);


          $notification=array(
            'message'=>'Brand Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('brand.index')->with($notification);  

        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $ab_image = $brand->brand_image;
        unlink($ab_image);

        Brand::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Brand Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function brabdinactive($id)
    {
        Brand::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Brand Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function brabdactive($id)
    {
        Brand::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Brand Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
