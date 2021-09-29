<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;

class ShopController extends Controller
{
    public function Index(Request $request)
    {

        $product = Product::query();

        // category

        if (!empty($_GET['category'])) {
           $slugs = explode(',',$_GET['category']);
           $catids = Category::select('id')->whereIn('slug',$slugs)->pluck('id')->toArray();
           $products = Product::whereIn('category_id',$catids)->paginate(1);
        }
        else{
                $products    =     Product::latest()->paginate(8);

        }
 

       $testimonials =    Testimonial::where('status',1)->orderBy('id','DESC')->get();
       $categories  =     Category::latest()->get();
       return view('frontend.shop',compact('categories','products','testimonials'));
    }

    public function ShopFilter(Request $request)
    {

        $data = $request->all();

        // filter category 

        $caturl = '';

        if (!empty($data['category'])) {
            foreach($data['category'] as $category){
                if (empty($caturl)) {
                   $caturl .= '&category='.$category;
                }
                else{
                    $caturl .= ','.$category;

                }
               
            }
            return Redirect()->route('shop',$caturl);
        }
    }
}
