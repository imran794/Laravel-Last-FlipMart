<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;
use Carbon\Carbon;
use Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.index',[
            'categories' => Category::latest()->get()
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
            'category_name'              => 'required',
            'category_icon'              => 'required',
        ]);


        $slug = Str::slug($request->category_name.'-'.carbon::now()->timestamp);

        Category::insert([
            'category_name'            => $request->category_name,
            'category_icon'            => $request->category_icon,
            'addedby'                  => Auth::id(),
            'slug'                     => $slug,
            'created_at'               => carbon::now()
        ]);

          $notification=array(
            'message'=>'Category Insert successfully',
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
          return view('admin.category.edit',[
            'edit_data' => Category::findOrFail($id),
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
            'category_name'              => 'required',
            'category_icon'              => 'required',
        ]);

        Category::findOrFail($id)->update([
            'category_name'            => $request->category_name,
            'category_icon'            => $request->category_icon,
            'updated_at'               => carbon::now()
        ]);

          $notification=array(
            'message'=>'Category Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('category.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
         public function destroy($id)
    {

        Category::findOrFail($id)->delete();
          $notification=array(
            'message'=>'Category Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function categoryinactive($id)
    {
        Category::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'Category Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function categoryactive($id)
    {
        Category::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'Category Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
