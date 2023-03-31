<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ShopController extends Controller
{

    public function show($id)
    {
        $cus = Auth::guard('cus')->user();
        $categories = ProductCategory::all();
        $brands = Brand::all();
       
        $products = Product::where('featured', true)->findOrFail($id);
        $comments = ProductComment::all();

        $avgRating = 0;
        $sumRating = array_sum(array_column($products->productComments->toArray(), 'rating'));
        $countRating = count($products->productComments);
        if($countRating !=0){
            $avgRating = $sumRating/$countRating;
        }
        // $products = Product::where('featured', true);
        return view('front.shop.show', compact('categories', 'products','brands','avgRating','comments','cus'));
    }
     
    public function index(Request $request)
    {
        $categories = ProductCategory::all();
        $brands = Brand::all();

        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'lastest';

        $search = $request->search ?? '';

        $products = Product::where('featured', true)->where('name', 'like', '%' .$search . '%'); //search

        $products = $this->filter($products, $request);

       $products = $this->sapxep($products, $sortBy, $perPage);

        return view('front.shop.index', compact('categories', 'products','brands'));
    }
    public function category($categoryName, Request $request)
    {

        $brands = Brand::all(); 

        $perPage = $request->show ?? 6;

        $sortBy = $request->sort_by ?? 'lastest';

        $categories = ProductCategory::all();

        $products = ProductCategory::where('name', $categoryName)->first()->products->toQuery(); // show thuoc tinh sp

        $products = $this->filter($products, $request);

        $products = $this->sapxep($products, $sortBy, $perPage);

        return view('front.shop.index', compact('categories','brands', 'products'));
    }


    public function sapxep($products, $sortBy, $perPage)
    {
        switch ($sortBy)    // sx sp
        {
            case 'lastest':
                $products = $products->orderBy('id');
                break;
            case 'oldest' :
                $products = $products->orderByDesc('id');
                break;
            case 'nameaz' :
                $products = $products->orderBy('name');
                break;
            case 'nameza' :
                $products = $products->orderByDesc('name');
                break;
            case 'pricelow':
                $products = $products->orderBy('price');
                break;
            case 'pricehigh':
                $products = $products->orderByDesc('price');
                break;
            default:
                $products = $products->orderBy('id');
        }


        // $products = Product::paginate(6); // show 6 sp


        $products = $products->paginate($perPage);

        $products->appends(['sort_by'=>$sortBy, 'show'=> $perPage]); //show on link

        return $products;
    }
    // xem san pham theo gia
    public function filter($products, Request $request)
    { 
        $brands =$request->brand ?? [];
        $brand_ids = array_keys($brands);

        $products = $brand_ids != null ? $products->whereIn('brand_id',$brand_ids) : $products;

        $priceMin = $request->price_min;
        $priceMax = $request->price_max;
        $priceMin = str_replace('VND', '', $priceMin);
        $priceMax = str_replace('VND', '', $priceMax);

        $products = ($priceMin != null && $priceMax != null) ? $products->whereBetween('price',[$priceMin,$priceMax]) : $products;
        

        return $products;
    }
    // binh luan san pham
    public function postComment(Request $request){
        ProductComment::create($request->all());

        return redirect()->back();
    }
}
