<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{ asset('/')}}">

    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | Phụ tùng</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@1.9.6/dist/tailwind.min.css"/>
    <!-- <link rel="stylesheet" href="front/css/tailwindcss.css" type="text/css"> -->
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/assets/css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

    <!-- <link href="front/header/img/favicon.ico" rel="icon"> -->

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="front/header/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="front/header/css/style.css" rel="stylesheet">
</head>

<div class="container-fluid">
        <div class="row bg-secondary py-2 px-xl-5">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="d-inline-flex align-items-center">
                    <i class="fa fa-envelope"></i>
                        hieu.vt.60cntt$ntu.edu.vn
                    <span class="text-muted px-2">|</span>
                    <i class="fa fa-phone"></i>
                        +84 356868694
                    
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="">
                            @if(auth()->guard('cus')->check())
                            <a href="./profile" class="login-panel"><i class="fa fa-user"></i>Xin chào {{auth()->guard('cus')->user()->name}} </a>
                            <span class="text-muted px-2">|</span>
                            <a href="./logout-customer" class="login-panel">Đăng xuất</a>
                            @else
                            <a href="./login" class="login-panel"><i class="fa fa-user"></i>Đăng nhập</a>
                        @endif
                    </a>
                    <!-- <a class="text-dark px-2" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-dark px-2" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-dark pl-2" href="">
                        <i class="fab fa-youtube"></i> -->
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="" class="text-decoration-none">
                    <!-- <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Shopper</h1> -->
                    <img src="front/img/logo.png" alt="" >
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" value="{{request('')}}" placeholder="Bạn cần tìm kiếm gì?">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <!-- <a href="" class="btn border">
                    <i class="fas fa-heart text-primary"></i>
                    <span class="badge">0</span>
                </a> -->
                <a href="./cart" class="btn border">
                    <i class="fas fa-shopping-cart text-primary"> Giỏ hàng</i>
                     <span>{{Cart::count()}}</span>
                </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->

    <!--Code main-->
    <div id="preloder">
        <div class="loader"></div>
    </div>



        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Sản phẩm</span>
                        <ul class="depart-hover">
                            <li><a href="#">Nhông sên</a></li>
                            <li><a href="#">Lốp & ruột xe</a></li>
                            <li><a href="#">Dầu nhớt</a></li>
                            <li><a href="#">Dây thắng, ga</a></li>
                            <li><a href="#">Bóng đèn</a></li>
                            <li><a href="#">Nhông sên</a></li>
                            <li><a href="#">Bộ máy</a></li>
                            <li><a href="#">Nhông sên</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li  class="{{(request()->segment(1) == '') ? 'active': ''}}"><a href="./">Trang Chủ</a></li>
                        <li  class="{{(request()->segment(1) == 'shop') ? 'active': ''}}"><a href="./shop">Sản phẩm</a></li>
                        <!-- <li><a href="dashdoard.php">admin</a></li> -->
                        <!-- <li><a>Kho</a>
                            <ul class="dropdown">
                                <li><a href="">Cantex</a></li>
                                <li><a href="">Caltrol</a></li>
                                <li><a href="">1</a></li>
                            </ul>
                        </li> -->
                        <li  class="{{(request()->segment(1) == 'blog') ? 'active': ''}}"><a href="./blog">Blog</a></li>
                        <!-- <li  class="{{(request()->segment(1) == 'lienhe') ? 'active': ''}}"><a href="./">Liên hệ</a></li> -->
                        <li  class="{{(request()->segment(1) == 'aboutus') ? 'active': ''}}"><a href="./">Về chúng tôi</a></li>

                        <!-- <li><a>Khác</a>
                            <ul class="dropdown">
                                <li><a href="blog-details.html">blog details</a></li>
                                <li><a href="shopping-cart.html">1</a></li>
                                <li><a href="check-out.html">2</a></li>
                                <li><a href="faq.html">3</a></li>
                            </ul>
                        </li> -->
                    </ul>
                </nav>
                    <div class="mobile-menu-wrap"></div>
                </div>
            </div>
        </header>

        <div class="container">
            @if(Session::has('yes'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!!Session::get('yes')!!}
            </div>
            @endif
            @if(Session::has('no'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {!!Session::get('no')!!}
            </div>
            @endif
        </div>
        

@yield('body')


            <div class="top">
                <!-- nút scroll top -->
                <i class="fas fa-arrow-up"></i>
            </div>
            <div class="zalo-chat-widget" data-oaid="1930533663365375923" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="300" data-height="300"></div>

<script src="https://sp.zalo.me/plugins/sdk.js"></script>
  <!-- Footer begin  -->
  <div class="partner-logo">
            <div class="container">
               <div class="logo-carousel owl-carousel">
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="front/img/logo-carousel/logo-11.png" width="2px">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="front/img/logo-carousel/logo-22.png">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="front/img/logo-carousel/logo-33.png">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="front/img/logo-carousel/logo-44.png">
                        </div>
                    </div>
                    <div class="logo-item">
                        <div class="tablecell-inner">
                            <img src="front/img/logo-carousel/logo-55.png">
                        </div>
                    </div>
               </div>
            </div>
        </div>

    <!-- footer copyright -->
        <footer class="footer-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-left">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="front/img/_footer-logo.png" height="25">
                                </a>
                            </div>
                            <ul>
                                <li>Dia chi</li>
                                <li>SDt</li>
                                <li>mail</li>
                            </ul>
                            <div class="footer-social">
                                <a href=""> <i class="fa fa-facebook"></i></a>
                                <a href=""> <i class="fa fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 offset-lg-1">
                        <div class="footer-widget">
                            <h5>Thông tin</h5>
                            <ul>
                                <li><a>Về chúng tôi</a></li>
                                <li><a>Check Out</a></li>
                                <li><a href="">Contact</a></li>
                                <li><a href="">Serivius</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="footer-widget">
                            <h5>Tài khoản của tôi</h5>
                            <ul>
                                <li><a>Về chúng tôi</a></li>
                                <li><a>Check Out</a></li>
                                <li><a href="">Contact</a></li>
                                <li><a href="">Serivius</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <h5>Đăng kí ngay</h5>
                        <p>Nhập email</p>
                        <form class="subscribe-form">
                            <input type="text" placeholder="Nhập email">
                            <button type="button">Đăng kí</button>
                        </form>
                    </div>
                </div>


            </div>
            <div class="copyright-reserved">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="copyright-text">
                            Copyright <script>document.write(new Date().getFullYear());</script> Bản quyền thuộc về Võ Thanh Hiếu <i class="fa fa-heart-o" aria-hidden="true"></i>
                            </div>
                            <div class="payment-pic">
                                <!-- <img src="front/img/payment-method.png"> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </footer>

    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/main.js"></script>


</body>

</html>
