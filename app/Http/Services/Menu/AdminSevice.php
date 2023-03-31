<?php

namespace App\Http\Services\Menu;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class AdminSevice
{

    public function create($request)
    {
        // return ProductCategory::create();
        try{
           User::create([
            'name' => (string) $request->input('name'),
            'password' => (string) bcrypt($request->input('password')),
            'phone' => (string) $request->input('phone'),
            'role_id' =>  (int) $request->input('role_id'),
            'email' => (string) $request->input('email'),

            
           ]);
           Session::flash('success', 'Thêm mới thành viên thành công');
        } catch (\Exception $err){
            Session::flash('error', 'Tài khoản đã được sử dụng');
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
