<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Carbon\Carbon;
use Image;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin.testimonial.index',[
            'testimonials' => Testimonial::latest()->get()
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
            'image'              => 'required',
            'des'                => 'required',
            'title'              => 'required',
            'sub_title'          => 'required',
        ]);

            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('uploads/testimonialimage/'.$name_gen);
            $save_url = 'uploads/testimonialimage/'.$name_gen;

        Testimonial::insert([
            'image'         => $save_url,
            'des'           => $request->des,
            'title'         => $request->title,
            'sub_title'     => $request->sub_title,
            'created_at'    => carbon::now()
        ]);

          $notification=array(
            'message'=>'Testimonial Insert successfully',
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
           return view('admin.testimonial.edit',[
            'edit_data' => Testimonial::findOrFail($id),
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
            'des'                => 'required',
            'title'              => 'required',
            'sub_title'          => 'required',
        ]);


        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(270,270)->save('uploads/testimonialimage/'.$name_gen);
            $save_urlup = 'uploads/testimonialimage/'.$name_gen;

            Testimonial::findOrFail($id)->update([
            'image'         => $save_urlup,
            'des'           => $request->des,
            'title'         => $request->title,
            'sub_title'     => $request->sub_title,
            'updated_at'           => carbon::now()
        ]);

          $notification=array(
            'message'=>'Testimonial Update successfully',
            'alert-type'=>'success'
        );
       return Redirect()->route('testimonial.index')->with($notification);    

        }

        else{

           Testimonial::findOrFail($id)->update([
            'des'           => $request->des,
            'title'         => $request->title,
            'sub_title'     => $request->sub_title,
            'updated_at'           => carbon::now()
        ]);


          $notification=array(
            'message'=>'Testimonial Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('testimonial.index')->with($notification);  

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
        $testimonial = Testimonial::findOrFail($id);
        $ab_image = $testimonial->image;
        unlink($ab_image);

        Testimonial::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Testimonial Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function testinactive($id)
    {
        Testimonial::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Testimonial Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function testactive($id)
    {
        Testimonial::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Testimonial Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
