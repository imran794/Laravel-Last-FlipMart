<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Banner;
use Carbon\Carbon;
use Image;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.banner.index',[
            'banners'       => Banner::latest()->get()
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
            'image'                 => 'required',
            'sub_title'             => 'required',
            'title'                 => 'required',
            'des'                   => 'required',
            'btn'                   => 'required',
        ]);

         $slug = Str::slug($request->title.'-'.carbon::now()->timestamp);

            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/bannerimage/'.$name_gen);
            $save_url = 'uploads/bannerimage/'.$name_gen;

        Banner::insert([
            'image'                => $save_url,
            'sub_title'            => $request->sub_title,
            'title'                => $request->title,
            'des'                  => $request->des,
            'btn'                  => $request->btn,
            'slug'                 => $slug,
            'created_at'           => carbon::now()
        ]);

          $notification=array(
            'message'=>'Banner Insert successfully',
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
        return view('admin.banner.edit',[
              'edit_data' => Banner::findOrFail($id),
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
            'sub_title'             => 'required',
            'title'                 => 'required',
            'des'                   => 'required',
            'btn'                   => 'required',
        ]);


        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('uploads/bannerimage/'.$name_gen);
            $save_urlup = 'uploads/bannerimage/'.$name_gen;

            banner::findOrFail($id)->update([
            'image'                => $save_urlup,
            'sub_title'            => $request->sub_title,
            'title'                => $request->title,
            'des'                  => $request->des,
            'btn'                  => $request->btn,
            'updated_at'           => carbon::now()
        ]);

          $notification=array(
            'message'=>'Banner Update successfully',
            'alert-type'=>'success'
        );
       return Redirect()->route('banner.index')->with($notification);    

        }

        else{

           banner::findOrFail($id)->update([
            'sub_title'            => $request->sub_title,
            'title'                => $request->title,
            'des'                  => $request->des,
            'btn'                  => $request->btn,
        ]);


          $notification=array(
            'message'=>'Banner Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('banner.index')->with($notification);  

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
        $banner = Banner::findOrFail($id);
        $ab_image = $banner->image;
        unlink($ab_image);

        Banner::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Banner Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function baninactive($id)
    {
        Banner::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Banner Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function banactive($id)
    {
        Banner::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Banner Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
