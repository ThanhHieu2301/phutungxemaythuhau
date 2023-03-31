<?php

namespace App\Http\Services\Menu;

use App\Models\Insurance;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SliderSevice
{


    public function create($request)
    {
        // return ProductCategory::create();
        try{
           Insurance::create([
            'barcode' => $request->input('barcode'),
            'time_start' => $request->input('time_start'),
            'time_end' => $request->input('time_end'),
           ]);
           Session::flash('success', 'Thêm bảo hành thành công');
        } catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
}

    