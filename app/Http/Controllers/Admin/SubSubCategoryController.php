<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Carbon\Carbon;

class SubSubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.subsubcategory.index',[
            'categories'       => Category::latest()->get(),
            'subcategories'    => SubCategory::latest()->get(),
            'subsubcategories'    => SubSubCategory::latest()->get()
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
            'subcategory_id'                 => 'required',
            'sub_sub_category_name'          => 'required',
        ]);

        SubSubCategory::insert([
            'category_id'                   => $request->category_id,
            'subcategory_id'                => $request->subcategory_id,
            'sub_sub_category_name'         => $request->sub_sub_category_name,
            'created_at'                    => carbon::now()
        ]);

          $notification=array(
            'message'=>'SubSubCategory Insert successfully',
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
         return view('admin.subsubCategory.edit',[
            'edit_data'        => SubSubCategory::findOrFail($id),
            'categories'       => Category::latest()->get(),
            'subcategories'    => SubCategory::latest()->get(),
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
            'subcategory_id'                 => 'required',
            'sub_sub_category_name'          => 'required',
        ]);

        SubSubCategory::findOrFail($id)->update([
            'category_id'                   => $request->category_id,
            'subcategory_id'                => $request->subcategory_id,
            'sub_sub_category_name'         => $request->sub_sub_category_name,
            'updated_at'                    => carbon::now()
        ]);

          $notification=array(
            'message'=>'SubSubCategory Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->route('subsubcategory.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SubSubCategory::findOrFail($id)->delete();
          $notification=array(
            'message'=>'SubSubCategory Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

     public function getSubCat($cat_id){
        $subcat = SubCategory::where('category_id',$cat_id)->orderBy('sub_category_name','ASC')->get();
        return json_encode($subcat);
    }
}
