<?php

namespace App\Http\Services\Menu;

use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RoleSevice
{


    public function create($request)
    {
        // return ProductCategory::create();
        try{
           Role::create([
            'name' => (string) $request->input('name'),
            $data = DB::table('permissions')->get(),
           ]);
           Session::flash('success', 'Thêm mới chức vụ thành công');
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
