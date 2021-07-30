<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Carbon\Carbon;
use Auth;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subcategory.index',[
            'categories'       => Category::latest()->get(),
            'subcategories'    => SubCategory::latest()->get()
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
            'category_id'                    => 'required',
            'sub_category_name'              => 'required',
        ]);


        $slug = Str::slug($request->sub_category_name.'-'.carbon::now()->timestamp);

        SubCategory::insert([
            'category_id'                   => $request->category_id,
            'sub_category_name'             => $request->sub_category_name,
            'slug'                          => $slug,
            'status'                        => 1,
            'created_at'                    => carbon::now()
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
           return view('admin.subcategory.edit',[
            'edit_data' => SubCategory::findOrFail($id),
            'categories'       => Category::latest()->get(),
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
            'category_id'                    => 'required',
            'sub_category_name'              => 'required',
        ]);

        SubCategory::findOrFail($id)->update([
            'category_id'                   => $request->category_id,
            'sub_category_name'             => $request->sub_category_name,
            'updated_at'                    => carbon::now()
        ]);

          $notification=array(
            'message'=>'SubCategory Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('subcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        SubCategory::findOrFail($id)->delete();
          $notification=array(
            'message'=>'SubCategory Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function subinactive($id)
    {
        SubCategory::findOrFail($id)->update(['status' => 0]);
         $notification=array(
            'message'=>'SubCategory Status Inactive',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
    public function subactive($id)
    {
        SubCategory::findOrFail($id)->update(['status' => 1]);
         $notification=array(
            'message'=>'SubCategory Status Active',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
