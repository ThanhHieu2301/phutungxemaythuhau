@extends('front.layout.master')

@section('title', 'Đăng kí')

@section('body')

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="index.html"><i class="fa fa-home"> Trang Chủ</i></a>
                            <span>Đăng kí</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        @include('front.auth.alert')
        <div class="register-login-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form">
                            <h2>Đăng kí</h2>
                            <form action="" method="POST" role="form">
                                <div class="group-input">
                                    <label for="username">Nhập tên tài khoản</label>
                                    <input type="text" name="name" id="username">
                                </div>
                                <div class="group-input">
                                    <label for="username">Nhập email</label>
                                    <input type="email" name="email" id="email">
                                </div>
                                <div class="group-input">
                                    <label for="pass">Mật khẩu</label>
                                    <input type="password" id="pass" name="password">
                                </div>
                                <div class="group-input">
                                    <label for="pass">Nhập lại mật khẩu</label>
                                    <input type="password" id="pass" name="confim_password">
                                </div>
                                <button type="submit" class="site-btn login-btn">Đăng kí</button>
                                @csrf
                            </form>
                            <div class="switch-login">
                                <a href="./login" class="or-login">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection