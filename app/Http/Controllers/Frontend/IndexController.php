<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Banner;
use App\Models\Testimonial;
use App\Models\MulitpleImage;
use App\Models\Blog;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Cinformation;
use carbon\carbon;

class IndexController extends Controller
{
    public function Index()
    {
        return view('frontend.index',[
            'products'      => Product::latest()->get(),
            'categories'    => Category::latest()->get(),
            'banners'       => Banner::latest()->get(),  
            'special_deals' => Product::where('special_deals',1)->where('status',1)->orderBy('id','DESC')->get(),
            'special_offer' => Product::where('special_offer',1)->where('status',1)->orderBy('id','DESC')->get(),
            'hot_dealss'    => Product::where('hot_deals',1)->where('status',1)->orderBy('id','DESC')->get(),
            'testimonials'  => Testimonial::where('status',1)->orderBy('id','DESC')->get(),
            'blogs'         => Blog::where('status',1)->orderBy('id','DESC')->get(),
        ]);
    }

    public function productdetails($slug)
    {
        
        $subcategories = SubCategory::latest()->first();
        $product = Product::where('product_slug',$slug)->first();
        $raleted_products =  Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
        $categories  =  Category::latest()->get();
        $hot_dealss    = Product::where('hot_deals',1)->where('status',1)->orderBy('id','DESC')->get();
        $testimonials = Testimonial::where('status',1)->orderBy('id','DESC')->get();
        return view('frontend.productdetails',compact('categories','product','subcategories','hot_dealss','testimonials','raleted_products'));
    } 


     public function blogpage()
    {
       
        return view('frontend.blog',[
            'blogs'     => Blog::latest()->get(),
            'categories'    => Category::latest()->get(),
        ]);
    }

    public function blogdetails($slug)
    {
        $categories  =  Category::latest()->get();
        $slug = Blog::where('slug',$slug)->first();
        return view('frontend.blogdetails',compact('slug','categories'));
    }

    public function faqpage()
    {
        return view('frontend.faq',[
            'faqs'   => Faq::latest()->get()
        ]);
    }

    public function contact()
    {
         return view('frontend.contact',[
              'cinformations' => Cinformation::where('status',1)->first(),
         ]);
    }

    public function contactstore(Request $request)
    {
         $request->validate([
            'name'              => 'required',
            'email'             => 'required',
            'title'             => 'required',
            'comment'           => 'required',
        ]);

        Contact::insert([
   
            'name'             => $request->name,
            'email'            => $request->email,
            'title'            => $request->title,
            'comment'          => $request->comment,
            'created_at'       => carbon::now()
        ]);

          $notification=array(
            'message'=>'contact Send successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function contactindex()
    {
         return view('admin.contact.index',[
            'contacts'      => Contact::latest()->get(),
         ]);
    }

    public function contactshow($id)
    {
            return view('admin.contact.view',[
            'edit_data'      => Contact::findOrFail($id)
         ]);
    }

    public function contactdelete($id)
    {
        Contact::findOrFail($id)->delete();
          $notification=array(
            'message'=>'contact Message Delete successfully',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }
}
