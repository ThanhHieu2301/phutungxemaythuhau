@extends('dashboard.layout.master3')

@section('title', 'Cá nhân ')

@section('body')
  <div class="dash-content">
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <!-- ORDERS TABLE -->
                <div class="box">
                @include('front.auth.alert')
                    <form class="forms-sample" method="POST">
                        <div>
                        <div class="box-header">
                            Tài khoản cá nhân
                        </div>
                          <hr>
                      
                          <label for="email"><b>Họ và tên</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" name="name" value="{{Auth::user()->name}}">
                          <label for="email"><b>Email</b></label>
                          <input type="text" id="exampleInputName1"  style="color: black;" name="email" value="{{Auth::user()->email}}">
                          <label for="email"><b>Mật khẩu</b></label>
                          <input type="text" id="exampleInputName1" name="password" placeholder="Bạn có thể nhập mật khẩu mới tại đây">
                          <label for="email"><b>Số điện thoại</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" name="phone" value="{{Auth::user()->phone}}">
                          <label for="email"><b>Chức vụ</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" value="{{Auth::user()->roles->name}}">
                      
                          <button type="submit" style="background-color:#ff7f00" class="registerbtn">Xác nhận</button>
                        </div>
                        @csrf
                      </form>
                </div>
                <!-- END ORDERS TABLE -->
            </div>
        </div>
    </div>
</div>
      @endsection

