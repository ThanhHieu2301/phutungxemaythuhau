@extends('dashboard.layout.master3')

@section('title', 'Thêm quyền ')

@section('body')
  <div class="dash-content">
    <div class="main-content">
        <div class="row">
            <div class="col-12">
                <!-- ORDERS TABLE -->
                <div class="box">
                <!-- @include('front.auth.alert') -->
                    <form class="forms-sample"  method="POST" role="form">
                        <div>
                        <div class="box-header">
                           Thêm chức vụ nhân viên
                        </div>
                             <hr>
                          <div>
                              <label for=""><b>Tên chức vụ</b></label>
                              <input type="text" name="name">
                          </div>
                          <div>
                              <label for=""><b>Các quyền</b></label>
                              <div>
                                  @foreach($permissions as $permission)
                                  <div>
                                      <input type="checkbox" name="permission_id[]" value="{{$permission->id}}">
                                      <label>{{$permission->display_name}}</label>
                                  </div>
                                  @endforeach
                              </div>
                              <label style="color: red;">* Chú thích: Chức năng quản lí nhân viên, duyệt đơn hàng, tài khoản khách hàng và thống kê chỉ dành cho quản lí và vị trí đặc biệt</label>
                          </div>
                      
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

