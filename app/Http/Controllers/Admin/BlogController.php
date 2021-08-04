<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Blog;
use Carbon\Carbon;
use Image;
use Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blog.index',[
            'blogs' => Blog::latest()->get()
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
            'btn'                => 'required',
        ]);

         $slug = Str::slug($request->title.'-'.carbon::now()->timestamp);

            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(780,433)->save('uploads/blogimage/'.$name_gen);
            $save_url = 'uploads/blogimage/'.$name_gen;

        Blog::insert([
            'image'         => $save_url,
            'des'           => $request->des,
            'title'         => $request->title,
            'btn'           => $request->btn,
            'slug'          => $slug,
            'addedby'       => Auth::id(),
            'created_at'    => carbon::now()
        ]);

          $notification=array(
            'message'=>'Blog Insert successfully',
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
        return view('admin.blog.edit',[
            'edit_data' => Blog::findOrFail($id),
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
            'btn'                => 'required'
        ]);


        if ($request->file('image')) {
            unlink($old_image);
            $image = $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(780,433)->save('uploads/blogimage/'.$name_gen);
            $save_urlup = 'uploads/blogimage/'.$name_gen;

            Blog::findOrFail($id)->update([
            'image'         => $save_urlup,
            'des'           => $request->des,
            'title'         => $request->title,
            'btn'           => $request->btn,
            'updated_at'    => carbon::now()
        ]);

          $notification=array(
            'message'=>'Blog Update successfully',
            'alert-type'=>'success'
        );
       return Redirect()->route('blog.index')->with($notification);    

        }

        else{

           Blog::findOrFail($id)->update([
            'des'           => $request->des,
            'title'         => $request->title,
            'btn'           => $request->btn,
            'updated_at'    => carbon::now()
        ]);


          $notification=array(
            'message'=>'Blog Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('blog.index')->with($notification);  

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
        $blog = Blog::findOrFail($id);
        $ab_image = $blog->image;
        unlink($ab_image);

        Blog::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Blog Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function bloginactive($id)
    {
        Blog::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Blog Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function blogactive($id)
    {
        Blog::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Blog Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
