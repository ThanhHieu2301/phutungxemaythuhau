<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;    
use Illuminate\Support\Facades\DB;


class OrderController extends Controller
{
    public function dashboard(){
        return view('dashboard.index');
    }
    public function welcome(){
        return view('dashboard.welcome');
    }
    public function pdf_products(){
        return view('dashboard.pdf-products');
    }
    public function pdf_orders(){
        return view('dashboard.pdf-orders');
    }
    //
    public function show_order(){
        $chart_order = Order::select(DB::raw("COUNT(*) as count"))
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('count');
        $months =  Order::select(DB::raw("Month(created_at) as month"))
                    ->whereYear('created_at',date('Y'))
                    ->groupBy(DB::raw("Month(created_at)"))
                    ->pluck('month');
        $data =[0,0,0,0,0,0,0,0,0,0,0,0];
        foreach($months as $index => $month){
            --$month;
            $data[$month] = $chart_order[$index];
        }


        $show_orders = Order::orderByDesc('id')->whereMonth('created_at',Carbon::now()->month)->limit(5)->get();
        $over_products = Product::where('qty','<', 5)->limit(5)->get();
        $show_orderdetails = Order::orderByDesc('id')->get();
        $count = DB::table('customers')->count();
        $count2 = DB::table('users')->count();
        $order = DB::table('orders')->whereMonth('created_at',Carbon::now()->month)->count();
        $order2 = DB::table('orders')->whereMonth('created_at',Carbon::now()->month)->where('transport',1)->count();
        $order3 = DB::table('orders')->whereMonth('created_at',Carbon::now()->month)->where('check_shipping',0)->count();
        $blog = DB::table('blogs')->count();
        $product = DB::table('products')->sum('qty');
        $total_order = DB::table('order_details')->whereMonth('created_at',Carbon::now()->month)->sum('total');
        $overs =  Product::where('qty','<', 5)->count();
        // $total = DB::table('products')->sum('price');
        if(request()->date_from && request()->date_to){
            $show_orderdetails = Order::whereBetween('created_at',[request()->date_from,request()->date_to])->get();
        }
        
        return view('dashboard.index',['data' => $data], compact('show_orders','show_orderdetails','count','order','blog','product','overs','order2','order3','count2','total_order','over_products'));
    }
   
    public function info_order($id){
        $show_orderdetails = Order::find($id);    
        // $show_orderdetails->items = 0;
        // foreach($show_orderdetails->product_order->unique('total') as $product)
        //    {
        //    $product->pivot->total;
        //    }
           
        return view("dashboard.info-order", compact('show_orderdetails'));
    }
}
