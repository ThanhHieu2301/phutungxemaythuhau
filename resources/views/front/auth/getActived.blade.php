@extends('front.layout.master')

@section('title', 'Kích hoạt tài khoản')

@section('body')


        <div class="register-login-section spad">
            <div class="container">
                <div class="row">   
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form">
                            <legend>Kích hoạt tài khoản</legend>
                            <!-- <h2>Vui lòng nhập email đã được đăng kí trong hệ thống</h2> -->
                            <form action="" method="POST" role="form">
                                <div class="group-input">
                                    <label for="email">Nhập Email của bạn</label>
                                    <input type="email" name="email" id="username">
                                    @error('email') <small class="help-block">{{$message}}</small>@enderror
                                </div>
                                <button type="submit" class="site-btn login-btn">Gửi mail xác nhận</button>
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endsection
