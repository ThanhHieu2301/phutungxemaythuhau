@extends('dashboard.layout.master3')

@section('title', 'Thêm hãng sản xuất ')

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
                            Thêm tài khoản nhân viên
                        </div>
                          <hr>
                      
                          <label for="email"><b>Email</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" name="email" placeholder="Nhập email" required>
                          <div class="col-md-6">
                                <div class="form-group row">
                                    <label ><b>Chức vụ  &nbsp;</b></label>
                                    <!-- <div class="col-sm-3">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="level" value="1" checked> Admin
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="level" value="2" > Quản lí
                                        </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" nname="level" value="3"  > Chăm sóc khách hàng
                                        </label>
                                        </div>
                                    </div> -->
                                    
                                    <select class="form-control" style=" height: 30px;border: 1px solid black;color:black" name="role_id" >
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}" name="role_id">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                          <label for="email"><b>Họ và tên</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" name="name" placeholder="Nhập tên" required>
                          <label for="email"><b>Mật khẩu</b></label>
                          <input type="password" id="exampleInputName1" style="color: black;" name="password" placeholder="Nhập mật khâủ"  required >
                          <label for="email"><b>Số điện thoại</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" name="phone" placeholder="Nhập số điện thoại" pattern="[0-9]{10}" required>

                      
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


