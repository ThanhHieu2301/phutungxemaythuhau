@extends('dashboard.layout.master3')

@section('title', 'Trang bài viết Blog')

@section('body')
<div class="dash-content">
        <div class="main-content">
           <div class="row">
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Thể loại cho bài viết Blog
                        </div>
                       
                        <div class="box-body overflow-scroll">
                            <div class="">
                                <form action="show-blog">
                                    <input type="text" class="box" name="search_cateblog" style="color: black;" value="{{request('')}}" placeholder="Nhập thể loại cần tìm" >
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-blog-category'">Thêm thể loại bài viết mới</button>
                            <table>
                           
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên thể loại</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_blog_categories as $show_blog_category)
                                <tbody>
                                    <tr>
                                        <td>{{$show_blog_category->id}}</td>
                                        <td>{{$show_blog_category->name}}</td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a  href="./delete-blog-category/{{$show_blog_category->id}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                        <span class="order-status order-ready">
                                            <a href="/edit-blogcategory/{{$show_blog_category->id}}" class="tm-product-delete-link">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                       </span>
                                        </td>
                                    </tr>
                                  
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- END ORDERS TABLE -->
                </div>
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Bài viết trên Blog
                        </div>
                        <div class="box-body overflow-scroll">
                            <div class="">
                                <form action="show-blog">
                                    <input type="text" class="box" name="search_blog" style="color: black;" value="{{request('')}}" placeholder="Nhập tiêu đề cần tìm" >
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-blog'">Thêm bài viết mới</button>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh bài viết</th>
                                        <th>Tiêu đề</th>
                                        <th>Loại bài viết</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_blogs as $show_blog)
                                <tbody>
                                    <tr>
                                    <!-- <td><img style="height: 70px" src="front/img/blog/{{$show_blog->image}}"></td> -->
                                        <td><img style="height: 70px" src="{{url('')}}/{{$show_blog->image}}" alt=""></td>
                                        <td>{{$show_blog->title}}</td>
                                        <td>{{$show_blog->blogCategory->name}}</td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a   href="./delete-blog/{{$show_blog->id}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                        <span class="order-status order-ready">
                                            <a href="/edit-blog/{{$show_blog->id}}" class="tm-product-delete-link">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                       </span>
                                        </td>
                                    </tr>
                                  
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                    <!-- END ORDERS TABLE -->
                </div>
           </div>
        </div>
</div>


                        
@endsection


