<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {

        $lopxeProducts = Product::where('featured', true)->where('product_category_id', 1)->get();
        $daunhotProducts = Product::where('featured', true)->where('product_category_id', 2)->get(); 
        $nhongsenProducts = Product::where('featured', true)->where('product_category_id', 3)->get(); 

        $categories = ProductCategory::all(); 

        $blogs = Blog::orderBy('id', 'desc')->limit(3)->get();

        $sliders = Slider::orderBy('id', 'desc')->limit(3)->get();
        // dd($banhxeProducts);
        return view('front.index',compact('lopxeProducts', 'daunhotProducts', 'nhongsenProducts','blogs','sliders','categories'));
        // return view('front.index'),;
    }

   
}
