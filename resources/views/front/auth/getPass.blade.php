@extends('front.layout.master')

@section('title', 'Đặt lại mật khẩu')

@section('body')


        <div class="register-login-section spad">
            <div class="container">
                <div class="row">   
                    <div class="col-lg-6 offset-lg-3">
                        <div class="login-form">
                            <legend>Đặt lại mật khẩu</legend>
                            <!-- <h2>Vui lòng nhập email đã được đăng kí trong hệ thống</h2> -->
                            <form action="" method="POST" role="form">
                                <div class="group-input">
                                    <label for="">Mật khẩu</label>
                                    <input type="password" id="pass" name="password">   
                                </div>
                                <div class="group-input">
                                    <label for="">Nhập lại mật khẩu</label>
                                    <input type="password" id="pass" name="confim_password">
                                    @error('confim_password')  <small>{!!$message!!}</small>@enderror
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
