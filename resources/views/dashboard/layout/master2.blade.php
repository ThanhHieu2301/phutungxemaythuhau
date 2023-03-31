
    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Apex Admin
    </title>
    <link rel="shortcut icon" href="dashboard//images/logo-mb.png" type="image/png">
    <!-- GOOGLE FONT -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!-- APP CSS -->
    <link rel="stylesheet" href="dashboard//css/grid.css">
    <link rel="stylesheet" href="dashboard//css/app.css">

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
        </style>
</head>

<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="sidebar-logo">
            <img src="./images/logo-lg.png" alt="Comapny logo">
            <div class="sidebar-close" id="sidebar-close">
                <i class='bx bx-left-arrow-alt'></i>
            </div>
        </div>
        <div class="sidebar-user">
            <div class="sidebar-user-info">
                <img src="./images/user-image.jpg" alt="User picture" class="profile-image">
                <div class="sidebar-user-name">
                    anh tuat
                </div>
            </div>
            <button class="btn btn-outline">
                <i class='bx bx-log-out bx-flip-horizontal'></i>
            </button>
        </div>
        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li>
                <a href="./admin" class="{{(request()->segment(1) == '') ? 'active': ''}}">
                    <i class='bx bx-home'></i>
                    <span>dashboard</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-shopping-bag'></i>
                    <span>sales</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chart'></i>
                    <span>analytic</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="./show_account" class="sidebar-menu-dropdown {{(request()->segment(1) == '') ? 'active': 'taikhoan'}}">
                    <i class='bx bx-user-circle'></i>
                    <span>Tài khoản</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#">
                            Tài khoản nhân viên
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Thêm mới nhân viên
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu {{(request()->segment(1) == '') ? 'active': 'type'}}">
                <a href="#" class="sidebar-menu-dropdown ">
                    <i class='bx bx-category'></i>
                    <span>Hãng là loại sản phẩm</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="./type">
                        Hãng và loại sản phẩm
                        </a>
                    </li>
                    <li>
                        <a href="./add-brand">
                        Thêm mới hãng sản xuất 
                        </a>
                    </li>
                    <li>
                        <a href="./add-category">
                        Thêm mới loại sản phẩm 
                        </a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-category'></i>
                    <span>e-commerce</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#">
                            list product
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            add product
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            orders
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-mail-send'></i>
                    <span>mail</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-chat'></i>
                    <span>chat</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-calendar'></i>
                    <span>calendar</span>
                </a>
            </li>
            <li class="sidebar-submenu">
                <a href="#" class="sidebar-menu-dropdown">
                    <i class='bx bx-cog'></i>
                    <span>settings</span>
                    <div class="dropdown-icon"></div>
                </a>
                <ul class="sidebar-menu sidebar-menu-dropdown-content">
                    <li>
                        <a href="#" class="darkmode-toggle" id="darkmode-toggle">
                            darkmode
                            <span class="darkmode-switch"></span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->

    <!-- MAIN CONTENT -->
    <div class="main">
        <div class="main-header">
            <div class="mobile-toggle" id="mobile-toggle">
                <i class='bx bx-menu-alt-right'></i>
            </div>
            <div class="main-title">
                dashboard
            </div>
        </div>
        <div class="main-content">

        @yield('body')


        </div>
    <!-- END MAIN CONTENT -->

    <div class="overlay"></div>

    <!-- SCRIPT -->
    <!-- APEX CHART -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- APP JS -->
    <script src="dashboard/js/app.js"></script>

</body>

</html>