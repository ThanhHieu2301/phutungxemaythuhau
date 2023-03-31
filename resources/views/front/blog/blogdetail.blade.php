@extends('front.layout.master')

@section('title', 'Nội dung bài viết')

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
<div class="blog-details">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="blog-details-inner">
                    <div class="blog-detail-title">
                        <h2>{{$blogs->title}}</h2>
                        <p>{{$blogs->blogCategory->name}}</p>
                    </div>
                    <div class="blog-large-pic">
                        <img src="{{url('')}}/{{$blogs->image}}" alt="">
                    </div>
                    <div class="blog-detail-desc">
                        <p>{{$blogs->description}}</p>
                    </div>
                    <div class="blog-quote">
                        <p>"{{$blogs->content}}"</p>
                    </div>
                    <div class="blog-more">
                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection