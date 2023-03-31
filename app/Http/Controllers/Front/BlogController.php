<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    public function show_blog(Request $request){
        $categories = ProductCategory::all(); 
        $show_blogs = Blog::all();
        $show_blog_categories = BlogCategory::all();

        if($request->has('search_cateblog'))
        {
            $show_blog_categories = BlogCategory::where('name', 'like', '%' .$request->search_cateblog . '%')->paginate(8);
        }else
        {
            $show_blog_categories =  BlogCategory::paginate(8);
        }

        if($request->has('search_blog'))
        {
            $show_blogs = Blog::where('title', 'like', '%' .$request->search_blog . '%')->paginate(8);
        }else
        {
            $show_blogs =  Blog::paginate(8);
        }

        return view('dashboard.show-blog',  compact('show_blog_categories', 'show_blogs','categories'));   //hien thi bai viet blog
    }
    public function blog(Request $request){
        $categories = ProductCategory::all(); 
        $blogs = Blog::all();
        $blogcategories = BlogCategory::all();

        // $perPage = $request->show ?? 6;
        // $sortBy = $request->sort_by ?? 'lastest';

        if($request->has('searchblog'))
        {
            $blogs= Blog::where('title', 'like', '%' .$request->searchblog . '%')->paginate(8);
        }else
        {
            $blogs = Blog::paginate(8);
        }


        return view('front.blog.blog',  compact('blogcategories', 'blogs','categories'));   //hien thi bai viet blog
    }
    public function blogdetail($id)
    {
        $categories = ProductCategory::all(); 
        $blogs = Blog::findOrFail($id);
        $blogcategories = BlogCategory::all();
        return view('front.blog.blogdetail',  compact('blogcategories', 'blogs','categories'));
    }
    public function blogcategory($blogcategoryName, Request $request){
        $categories = ProductCategory::all(); 
        $blogcategories = BlogCategory::all();
        $blogs = BlogCategory::where('name', $blogcategoryName)->first()->blogCategory->toQuery()->paginate();
        
        return view('front.blog.blog',  compact('blogcategories', 'blogs','categories'));   //hien thi bai viet blog
    }
}
