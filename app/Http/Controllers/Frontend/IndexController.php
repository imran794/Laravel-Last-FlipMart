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
        $slug = Product::where('product_slug',$slug)->first();
        $categories  =  Category::latest()->get();
        $hot_dealss    = Product::where('hot_deals',1)->where('status',1)->orderBy('id','DESC')->get();
        $testimonials = Testimonial::where('status',1)->orderBy('id','DESC')->get();
        return view('frontend.productdetails',compact('categories','slug','subcategories','hot_dealss','testimonials'));
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
}
