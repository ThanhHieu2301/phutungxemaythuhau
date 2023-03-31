@extends('front.layout.master')

@section('title', 'Chi tiết sản phẩm')

@section('body')

    <!-- đường dẫn -->
        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="index.blade.php"><i class="fa fa-home"> Trang Chủ</i></a>
                            <a href="shop.php">Sản phẩm</a>
                            <span>Chi tiết sản phẩm</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="product-shop spad page-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    @include ('front\shop\commponents\products-sidebar-filter')
                    </div>
                    <!-- show product -->
                    <div class="col-lg-9 order-1 order-lg-2 ">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="product-pic-zoom">
                                    <img class="product-big-img" src="front/img/products/{{$products->image}}" alt="">
                                    <div class="zoom-icon">
                                        <i class="fa fa-search-plus"></i>
                                    </div>
                                </div>
                               <!-- <div class="product-thumbs">
                                    <div class="product-thumbs-track ps-slider owl-carousel">
                                     @foreach($products as $product)
                                        <div class="pt active" data-imgbigurl="front/img/products/{{$products->image}}">
                                            <img src="front/img/products/{{$products->image}}" alt="">
                                        </div>
                                        @endforeach
                                    </div>
                                </div> -->
                               
                            </div>
                            <div class="col-lg-6">
                                <div class="product-details">
                                    <!-- Tên sản phẩm -->
                                    <div class="pd-title">
                                        <h3>{{$products->name}}</h3>
                                    </div>
                                       <!-- Đánh giá -->
                                    <div class="pd-rating">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $avgRating)
                                                <i class="fa fa-star"></i>
                                            @else
                                                <i class="fa fa-star-o"></i>
                                            @endif
                                        @endfor
                                    </div>
                                    <div class="pd-tags">
                                        <li><span>Loại sản phẩm</span>:{{$products->productCategory->name}}</li>
                                        Mô tả: {{$products->description}}
                                    </div>
                                    <!-- Giá và mô tả -->
                                    <div class="pd-desc">
                                       
                                        <h4>Giá: {{number_format($products->price)}} VND</h4>
                                    </div>
                                    
                                    <!-- thêm vào giỏ -->
                                    <div class="quantity">
                                        <!-- <div class="pro-qty">
                                            <input type="text" value="1">
                                        </div> -->
                                        <a href="./cart/add/{{$products->id}}" class="primary-btn pd-cart">Thêm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab">
                            <div class="tab-item">
                                <ul class="nav" role="tablist">
                                    <li><a class="active" href="" data-toggle="tab" role="tab">Bình luận ({{count($products->productComments)}})</a></li>
                                </ul>
                            </div>
                            <div class="tab-item-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                        <div class="customer-review-option">
                                            <h4>{{count($products->productComments)}} Bình luận</h4>
                                            <div class="comment-option">
                                                @foreach($products->productComments as $productComment)
                                                <div class="co-item">
                                                    <div class="avatar-text">
                                                        <div class="at-rating">
                                                           @for($i = 1; $i <= 5; $i++)
                                                                @if($i <= $productComment->rating)
                                                                    <i class="fa fa-star"></i>
                                                                @else
                                                                    <i class="fa fa-star-o"></i>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                        <h5>{{$productComment->name}}<span>{{$productComment->created_at}}</span></h5>
                                                        <div class="at-reply">{{$productComment->messages}}</div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="leave-comment">
                                                <h4>Viết bình luận</h4>
                                                <form action="" method="post"class="comment-form">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{$products->id}}">
                                                 
                                                    <div class="row">
                                                    @if(auth()->guard('cus')->check())
                                                        <div class="col-lg-6">
                                                            <input type="text" name="name"  value="{{$cus->name}}"  placeholder="Tên">
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <textarea type="text" name="messages" placeholder="Nội dung"></textarea>
                                                        <div class="personal-rating">
                                                            <h6>Đánh giá</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>
                                                            <button type="submit" class="site-btn">Gửi</button>
                                                        </div>
                                                        @else
                                                            <a href="./login">Bạn cần đăng nhập để bình luận</a>
                                                        @endif
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

                    <script src="front/js/alert-login.min.js"></script>
                </section>
@endsection
