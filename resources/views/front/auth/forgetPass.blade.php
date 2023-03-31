@extends('front.layout.master')

@section('title', 'Quên mật khẩu')

@section('body')

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="index.php"><i class="fa fa-home"> Trang Chủ</i></a>
                            <span>Đăng nhập</span>
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
                            <legend>Lấy lại mật khẩu</legend>
                            <h2>Vui lòng nhập email đã được đăng kí trong hệ thống</h2>
                            <form action="" method="POST" role="form">
                                <div class="group-input">
                                    <label for="email">Nhập Email của bạn</label>
                                    <input type="email" name="email" id="username">
                                    @error('email') <small class="help-block">{{$message}}</small>@enderror
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
