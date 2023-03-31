@extends('dashboard.layout.master3')

@section('title', 'Chi tiết tài khoản nhân viên ')

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
                         Thông tin chi tiết đơn hàng
                        </div>
                          <hr>
                          <label for="email"><b>Mã đơn hàng</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value="{{$show_orderdetails->id}}">
                          <label for="email"><b>Họ và tên</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value="{{$show_orderdetails->full_name}}">
                          <label for="email"><b>Sản phẩm</b></label>
                          @foreach($show_orderdetails->product_order as $product)
                          <input type="text" id="exampleInputName1"  style="color: black;" readonly value="{{$product->pivot->qty}} x {{$product->name}} -  {{number_format($product->pivot->total)}} VND ">
                          @endforeach
                          <label for="email"><b>Địa chỉ nhận hàng</b></label>
                          <input type="text" id="exampleInputName1"  style="color: black;" readonly value="{{$show_orderdetails->street_address}} - {{$show_orderdetails->district}} - {{$show_orderdetails->city}}">
                          <label for="email"><b>Tình trạng đơn hàng</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value=" @if ($show_orderdetails->check_shipping == 1) @if ($show_orderdetails->transport == 1)Đã giao hàng @else Đang vận chuyển @endif @else Chưa duyệt
                                            @endif">
                          <label for="email"><b>Ngày mua</b></label>
                          <input type="text" id="exampleInputName1" style="color: black;" readonly value="{{$show_orderdetails->created_at}}">
                          <!-- @foreach($show_orderdetails->product_order->unique('total')->collect('id') as $product)
                          <input type="text" id="exampleInputName1"  style="color: black;" readonly value=" {{number_format($product->pivot->total)}} VND">
                         @endforeach -->
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

