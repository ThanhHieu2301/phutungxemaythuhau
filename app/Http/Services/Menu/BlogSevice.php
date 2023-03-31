<?php

namespace App\Http\Services\Menu;

use App\Models\Blog;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class BlogSevice
{
    // public function getALL()
    // {
    //     return ProductCategory::orderbyDesc('id')->paginate(20);
    // }

    public function create($request)
    {
        // return ProductCategory::create();
        try{
           Blog::create([
            'title' => (string) $request->input('title'),
            'content' =>  (string) $request->input('content'),
            'blog_category_id' =>  (int) $request->input('blog_category_id'),
            'description' =>  (string) $request->input('description'),
            'image' => (string) $request->input('image'),
           ]);
           Session::flash('success', 'Thêm mới bài viết thành công');
        } catch (\Exception $err){
            Session::flash('error',$err->getMessage());
            return false;
        }
        return true;
    }
}
