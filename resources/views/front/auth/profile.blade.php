@extends('front.layout.master')

@section('title', 'Cá nhân')

@section('body')

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="index.php"><i class="fa fa-home">Trang Chủ</i></a>
                            <span>Cá nhân</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Đăng nhập -->

        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form">
                            <h2>Cá Nhân</h2>
                            <form action="" method="post" role="form">
                           
                                <!-- <form> -->
                                
                                <div class="group-input">
                                    <label for="username">Tên tài khoản</label>
                                    <input type="text" name="name" id="username" value="{{$cus->name}}">
                                </div>
                                <div class="group-input">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="username" value="{{$cus->email}}">
                                </div>
                                <div class="group-input">
                                    <label for="pass">Mật khẩu</label>
                                    <input type="password" id="pass" name="password" placeholder="Mật khẩu">
                                </div>
                                <button type="submit" class="site-btn login-btn">Xác nhận</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
