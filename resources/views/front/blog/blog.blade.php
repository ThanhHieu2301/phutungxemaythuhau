@extends('front.layout.master')

@section('title', 'Blog')

@section('body')

<!-- đường dẫn -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="./"><i class="fa fa-home"> Trang Chủ</i></a>
                    <span>Blog</span>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                <div class="blog-sidebar">
                    <!-- thanh tim kiem -->
                    <div class="search-form">
                        <h4>Tìm kiếm</h4>
                        <form action="blog">
                            <input type="text" name="searchblog" value="{{request('')}}" placeholder="Nhập tiêu đề">
                            <button type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <div class="blog-catagory">
                        <h4>Đề tài</h4>
                        @foreach($blogcategories as $blogcategory)
                        <ul>
                            <li> <a href="blog/{{$blogcategory->name}}">{{$blogcategory->name}}</a></li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-9 order-1 order-lg-12">
                <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <!-- <img style="height: 255px" src="front/img/blog/{{$blog->image}}" alt=""> -->
                                <img style="height: 255px" src="{{url('')}}/{{$blog->image}}" alt="">
                                
                            </div>
                            <div class="bi-text">
                                <a href="blog/blog/{{$blog->id}}">
                                    <h4>{{$blog->title}}</h4>
                                </a>
                                <p>{{$blog->blogCategory->name}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="front/img/blog/blog1.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="blog/blogdetail">
                                    <h4>Cách đọc thông số dầu nhớt xe máy mà bạn nên biết</h4>
                                </a>
                                <p>Thông tin</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="blog-item">
                            <div class="bi-pic">
                                <img src="front/img/blog/blog1.jpg" alt="">
                            </div>
                            <div class="bi-text">
                                <a href="">
                                    <h4>Cách đọc thông số dầu nhớt xe máy mà bạn nên biết</h4>
                                </a>
                                <p>Thông tin</p>
                            </div>
                        </div>
                    </div> -->
                    
                </div>
                <div >{{$blogs->links()}}</div>
            </div>
  
        </div>
    </div>
</section>

@endsection