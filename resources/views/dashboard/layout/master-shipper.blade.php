<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <base href="{{ asset('/')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!----======== CSS ======== -->

    <link rel="shortcut icon" href="front/img/favicon.png">

    <link rel="stylesheet" href="dashboard/style.css">
     
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <link rel="shortcut icon" href="/images/logo-mb.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->
    <link rel="stylesheet" href="dashboard/css/grid.css">
    <link rel="stylesheet" href="dashboard/css/app.css">

    

    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@1.9.6/dist/tailwind.min.css"/>
    
        
    <title>@yield('title') | Quản lí</title>

    
    <style>
        body {
          font-family: Arial, Helvetica, sans-serif;
          /* background-color: black; */
        }
        
        * {
          box-sizing: border-box;
        }
        
        /* Add padding to containers */
        .container {
          padding: 16px;
          /* background-color: white; */
        }
        
        /* Full-width input fields */
        input[type=text], input[type=password] {
          width: 100%;
          padding: 15px;
          margin: 5px 0 22px 0;
          display: inline-block;
          border: none;
          background: #f1f1f1;
        }
        
        input[type=text]:focus, input[type=password]:focus {
          background-color: #ddd;
          outline: none;
        }
        
        /* Overwrite default styles of hr */
        hr {
          border: 1px solid #f1f1f1;
          margin-bottom: 25px;
        }
        
        /* Set a style for the submit button */
        .registerbtn {
          background-color: blue;
          color: white;
          padding: 16px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
          opacity: 0.9;
        }
        ::placeholder {
        color: black;
        opacity: 1; /* Firefox */
        }

        :-ms-input-placeholder { /* Internet Explorer 10-11 */
        color:black;
        }

        ::-ms-input-placeholder { /* Microsoft Edge */
        color:black;
        }
        
        </style>
</head>
<body>
    <nav>
        <div class="logo-name">
            <div class="logo-image">
             <img src="front/img/zyro-image(1) - Copy.png" alt="">
            </div>
            <span class="logo_name">Dashboard</span>
        </div>

        <div class="menu-items">
            <ul class="nav-links">
                <li>
                @can('show-chart')
                    <a href="./order">
                    <i class="uil uil-estate"  style="color:red"></i>
                    <span class="link-name">Thống kê</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-user')
                    <a href="./show_account">
                    <i class='fa fa-user-circle' style="color:#005fbf;"></i>
                    <span class="link-name">Tài khoản</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-customer')
                    <a href="./show_customer">
                    <i class='fa fa-users' style="color: green;"></i>
                    <span class="link-name">Khách hàng</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-role')
                    <a href="./role">
                    <i class="fa fa-pen" style="color: #bf00bf;"></i>
                    <span class="link-name">Quyền tài khoản</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-type')
                    <a href="./type">
                    <i class='bx bx-category' style="color:#ffcc00;"></i>
                    <span class="link-name">Thuộc tính sản phẩm</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-product')
                    <a href="./product">
                    <i class="fa fa-thumbs-up" style="color:red"></i>
                    <span class="link-name">Sản phẩm</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-checkorder')
                    <a href="./show_checkorder">
                    <i class="fa fa-dolly" style="color:#005fbf;"></i>
                    <span class="link-name">Đơn hàng</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-insurance')
                    <a href="./show-insurance">
                    <i class="fa fa-user-shield" style="color:green"></i>
                    <span class="link-name">Bảo hành</span>
                    </a>
                    @endcan
                <li>
                    @can('show-comment')
                    <a href="./comment">
                    <i class="fa fa-comments" style="color:#bf00bf"></i>
                    <span class="link-name">Bình luận</span>
                    </a>
                    @endcan
                </li>
           
                <li>
                @can('show-blog')
                    <a href="./show-blog">
                    <i class="fa fa-blog" style="color:#ffcc00;"></i>
                    <span class="link-name">Blog</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-slider')
                    <a href="./show-slider" >
                    <i class="fa fa-image" style="color:red;"></i>
                    <span class="link-name">Slider</span>
                    </a>
                    @endcan
                </li>
                <li>
                    @can('show-shipping')
                    <a href="./show-shipping" >
                    <i class="fa fa-truck" style="color:green;"></i>
                    <span class="link-name">Vận chuyển</span>
                    </a>
                    @endcan
                </li>
            <!-- </ul> -->
            <ul class="logout-mode">
                 <li>
                    <a href="./info">
                    <i class="fa fa-user"></i>
                    <span class="link-name">Cá nhân</span>
                    </a>
                </li>
                <li><a href="{{asset('logout')}}">
                    <i class="uil uil-signout"></i>
                    <span class="link-name">Đăng xuất</span>
                </a></li>

                <li class="mode">
                    <a href="#">
                        <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                  <span class="switch"></span>
                </div>
                </li>
            </ul>
    </ul>
        </div>
    </nav>

    <section class="dashboard">
    <form action="product">
        <div class="top">
            <i class="uil uil-bars sidebar-toggle"></i>
            
            <!-- <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" name="keyword" id="keyword" placeholder="Bạn cần tìm kiếm gì?">
            </div> -->

            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" name="search" value="{{request('')}}" placeholder="Bạn cần tìm kiếm đơn hàng nào?">
                <button type="submit"><i class="ti-search"></i></button>
            </div>
            <div>
                
            </div>
            
            <img src="images/profile.jpg" alt="">
            <a>{{Auth::user()->email}}</a>
        </div>
    </form>


        @yield('body')


        </section>

    <script src="dashboard/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js" integrity="sha512-sW/w8s4RWTdFFSduOTGtk4isV1+190E/GghVffMA9XczdJ2MDzSzLEubKAs5h0wzgSJOQTRYyaz73L3d6RtJSg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   <script>
       $(document).ready(function() {
           $(document).on('keyup','#keyword',function(){
               var keyword = $(this).val();

               $.ajax({
                   type: "get",
                   url:"/search",
                   data:{keyword: keyword},
                   dataType: "json",
                   success: function(response){
                        $('#listUser').html(response);
                   }
               });
           });
       });
   </script>
   
</body>
</html>