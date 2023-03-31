<?php

namespace App\Http\Services\Menu;

use App\Models\Slider;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class SliderSevice
{


    public function create($request)
    {
        // return ProductCategory::create();
        try{
           Slider::create([
            'title' => (string) $request->input('name'),
            'description' =>  (string) $request->input('description'),
            'image' => (string) $request->input('image'),
           ]);
           Session::flash('success', 'Thêm mới slide thành công');
        } catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }

    // public function destroy($request)
    // {
    //     $id = (int) $request->input('id');
    //     $menu = ProductCategory::where('id', $id)->first();
    //     if($menu)
    //     {
    //         return ProductCategory::where('id', $id)->delete();
    //     }
    //     return false;
    // }
}
