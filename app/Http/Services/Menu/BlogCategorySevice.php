<?php

namespace App\Http\Services\Menu;

use App\Models\BlogCategory;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BlogCategorySevice
{
    // public function getALL()
    // {
    //     return ProductCategory::orderbyDesc('id')->paginate(20);
    // }

    public function create($request)
    {
        // return ProductCategory::create();
        try{
           BlogCategory::create([
            'name' => (string) $request->input('name'),
            // 'slug' => Str::slug($request->input('name'),'-')
           ]);
           Session::flash('success', 'Thêm mới thể loại thành công');
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
