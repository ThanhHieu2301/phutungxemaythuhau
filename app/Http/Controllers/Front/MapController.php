<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map()
    {
        $categories = ProductCategory::all(); 
        return view('front.map.map',compact('categories'));
    }
    public function search(Request $request)
    {
        $output = '';
        $products = Product::where('name','LIKE','%'.$request->keyword.'%')->get();
        foreach ($products as $product)
        {
            $output .= ' <tr>
                            <td>'.$product->name.'</td>
                        </tr>';
        }
        return response()->json($output);
    }
}
