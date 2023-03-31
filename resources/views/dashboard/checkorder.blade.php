@extends('dashboard.layout.master3')

@section('title', 'Duyệt đơn hàng ')

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
                            Chi tiết đơn hàng được duyệt
                        </div>
                          <hr>
                          <label for="email"><b>Mã đơn hàng</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value="{{$checkorders->id}}">
                          <label for="email"><b>Họ và tên</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value="{{$checkorders->full_name}}">
                          <label for="email"><b>Email</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value="{{$checkorders->email}}">
                          <label for="email"><b>Ngày đặt</b></label>
                          <input type="text" id="exampleInputName1"  style="color: black;" readonly value="{{$checkorders->created_at}}">
                          <label for="email"><b>Sản phẩm</b></label>
                          @foreach($checkorders->product_order as $product)
                          <input type="text" id="exampleInputName1"  style="color: black;" readonly value="{{$product->name}}">
                          @endforeach
                          <label for="email"><b>Địa chỉ</b></label>
                          <input type="text" id="exampleInputName1"  style="color: black;" readonly value="Mã zip: {{$checkorders->zip}} & Nơi nhận hàng: {{$checkorders->street_address}} - {{$checkorders->district}} - {{$checkorders->city}}">
                          <label for="email"><b>Số điện thoại</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value="{{$checkorders->phone}}">
                      
                          <button type="submit" style="background-color:#ff7f00" name="check_shipping" value="1" class="registerbtn">Duyệt đơn hàng</button>
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

