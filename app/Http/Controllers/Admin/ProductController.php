<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;
use App\Models\MulitpleImage;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Auth;
use Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index',[
            'brands'              => Brand::latest()->get(),
            'categories'          => Category::latest()->get(),
            'subcategories'       => SubCategory::latest()->get(),
            'subsubcategories'    => SubSubCategory::latest()->get(),
            'products'            => Product::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          return view('admin.product.create',[
            'brands'              => Brand::latest()->get(),
            'categories'          => Category::latest()->get(),
            'subcategories'       => SubCategory::latest()->get(),
            'subsubcategories'    => SubSubCategory::latest()->get(),
        ]);
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
            'brand_id'                  => 'required',
            'category_id'               => 'required',
            'subcategory_id'            => 'required',
            'subsubcategory_id'         => 'required',
            'product_name'              => 'required',
            'product_code'              => 'required',
            'product_qty'               => 'required',
            'product_tags'              => 'required',
            'selling_price'             => 'required',
            'short_des'                 => 'required',
            'long_des'                  => 'required',
            'product_thambnail'         => 'required|mimes:jpeg,jpg,png,gif,webp,max:10000',
        ]);

            $image = $request->file('product_thambnail');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(917,1000)->save('uploads/products/thambnail/'.$name_gen);
            $save_url = 'uploads/products/thambnail/'.$name_gen;



       $slug = Str::slug($request->product_name.'-'.carbon::now()->timestamp);

     $product_id =    Product::insertGetId([
            'brand_id'               => $request->brand_id,
            'category_id'            => $request->category_id,
            'subcategory_id'         => $request->subcategory_id,
            'subsubcategory_id'      => $request->subsubcategory_id,
            'product_name'           => $request->product_name,
            'product_slug'           => $slug,
            'product_code'           => $request->product_code,
            'product_qty'            => $request->product_qty,
            'product_tags'           => $request->product_tags,
            'product_size'           => $request->product_size,
            'product_color'          => $request->product_color,
            'selling_price'          => $request->selling_price,
            'discount_price'         => $request->discount_price,
            'short_des'              => $request->short_des,
            'long_des'               => $request->long_des,
            'hot_deals'              => $request->hot_deals,
            'product_thambnail'      => $save_url,
            'featured'               => $request->featured,
            'special_offer'          => $request->special_offer,
            'special_deals'          => $request->special_deals,
            'created_at'             => Carbon::now(),
        ]);

          $images = $request->file('mulitple_images');
        foreach ($images as $img) {
        $make_name=hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
        Image::make($img)->resize(917,1000)->save('uploads/products/mulitpleimages/'.$make_name);
        $uplodPath = 'uploads/products/mulitpleimages/'.$make_name;

        MulitpleImage::insert([
            'product_id'      => $product_id,
            'mulitple_images' => $uplodPath,
            'created_at'      => Carbon::now(),
        ]);
    }

          $notification=array(
            'message'=>'Product Insert successfully',
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
        return view('admin.product.view',[
           'edit_data'         => Product::findOrFail($id),
            'brands'            => Brand::latest()->get(),
            'categories'        => Category::latest()->get(),
            'multiple_images'   => MulitpleImage::where('product_id',$id)->latest()->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.product.edit',[
            'edit_data'         => Product::findOrFail($id),
            'brands'            => Brand::latest()->get(),
            'categories'        => Category::latest()->get(),
            'multiple_images'   => MulitpleImage::where('product_id',$id)->latest()->get()
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
            'brand_id'                  => 'required',
            'category_id'               => 'required',
            'subcategory_id'            => 'required',
            'subsubcategory_id'         => 'required',
            'product_name'              => 'required',
            'product_code'              => 'required',
            'product_qty'               => 'required',
            'product_tags'              => 'required',
            'selling_price'             => 'required',
            'short_des'                 => 'required',
            'long_des'                  => 'required',
            'product_thambnail'         => 'required|mimes:jpeg,jpg,png,gif,webp,max:10000',
        ]);

            Product::findOrFail($id)->update([
            'brand_id'               => $request->brand_id,
            'category_id'            => $request->category_id,
            'subcategory_id'         => $request->subcategory_id,
            'subsubcategory_id'      => $request->subsubcategory_id,
            'product_name'           => $request->product_name,
            'product_code'           => $request->product_code,
            'product_qty'            => $request->product_qty,
            'product_tags'           => $request->product_tags,
            'product_size'           => $request->product_size,
            'product_color'          => $request->product_color,
            'selling_price'          => $request->selling_price,
            'discount_price'         => $request->discount_price,
            'short_des'              => $request->short_des,
            'long_des'               => $request->long_des,
            'hot_deals'              => $request->hot_deals,
            'featured'               => $request->featured,
            'special_offer'          => $request->special_offer,
            'special_deals'          => $request->special_deals,
            'updated_at'             => Carbon::now(),
        ]);

          $notification=array(
            'message'=>'Product Update successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getsubSubCat($subcat_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id',$subcat_id)->orderBy('sub_sub_category_name','asc')->get();
        return json_encode($subsubcat);
    }
}
