@extends('dashboard.layout.master3-1')

@section('title', 'Thống kê')

@section('body')
<div class="dash-content">
    <div class="main-content">
        <div class="row">
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover"style="background-color:#ff7f00">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                        Khách hàng đăng kí
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                            {{$count}}
                            </div>
                            <i class='bx bx-user'></i>
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover" style="background-color: #00bf00;">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                    
                           Số tài khoản quản lí, nhân viên
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                      {{$count2}}
                            </div>
                            <i class='bx bx-chat'></i>
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover" style="background-color: #e25f5f;">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Sản phẩm có số lượng ít hơn 5
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                            {{$overs}}
                            </div>
                            <i class='bx bx-money'></i>
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover" style="background-color: #6767e0;">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                        Số lượng sản phẩm trong kho
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                            {{$product}}
                            </div>
                            <i class='bx bx-shopping-bag'></i>
                          
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover" style="background-color: #ff7f00;">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Số đơn đã giao trong tháng
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                {{$order2}}
                            </div>
                            <i class='bx bx-shopping-bag'></i>
                          
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover" style="background-color:#00bf00 ; ">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Số đơn đặt hàng trong tháng
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                {{$order}}
                            </div>
                            <i class='bx bx-shopping-bag'></i>
                          
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover" style="background-color: #e25f5f;">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                            Đơn hàng chưa duyệt
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                                {{$order3}}
                            </div>
                            <i class='bx bx-shopping-bag'></i>
                          
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
            <div class="col-3 col-md-6 col-sm-12">
                <div class="box box-hover" style="background-color: #6767e0;">
                    <!-- COUNTER -->
                    <div class="counter">
                        <div class="counter-title">
                        Doanh thu trong tháng
                        </div>
                        <div class="counter-info">
                            <div class="counter-count">
                            {{number_format($total_order)}} VND
                            </div>
                            <i class='bx bx-shopping-bag'></i>
                          
                        </div>
                    </div>
                    <!-- END COUNTER -->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-3 col-md-6 col-sm-12">
                <!-- TOP PRODUCT -->
                <div class="box f-height">
                    <div class="box-header">
                        Thông báo đặt hàng
                    </div>
                    <div class="box-body">
                        @foreach($show_orders as $show_order)
                        <ul class="product-list">
                            <li class="product-list-item">
                                <div class="item-info">
                                    <div class="item-name">
                                        <div class="product-name">Khách hàng</div>
                                        <div class="text-second">{{$show_order->full_name}}</div>
                                    </div>
                                </div>
                                <div class="item-sale-info">
                                    
                                    <div class="product-sales">Đặt 1 đơn hàng</div>
                                    <div class="text-second">{{$show_order->created_at}}</div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <!-- TOP PRODUCT -->
            </div>

      
   
            <div class="col-9 col-md-6 col-sm-12">
                <!-- ORDERS TABLE -->
                <div class="box">
                    <div class="box-body overflow-scroll">
                    <canvas id="myChart" style="width: 900px; height: 500; margin: auto "></canvas>
                    </div>
                </div>
                <!-- END ORDERS TABLE -->
            </div>

          
            <div class="col-12">
                <!-- ORDERS TABLE -->
                <div class="box">
                    <div class="box-header">
                        Đơn đặt hàng
                    </div>
                    <form class="forms-sample" method="POST">
                        <div>
                                <input type="date" class="box" style="background-color: white; height:40px" name="date_from">

                                <input type="date" class="box" style="background-color: white; height:40px"  name="date_to">

                                <button type="submit"  class="box" style="background-color: blue; color:white; height:60px ">Xác nhận</button>
                        </div>
                        @csrf
                    </form>
                    &nbsp;
                    <br>
                    <span class="order-status order-ready">
                            <a href="{{route('orderpdf')}}" class="tm-product-delete-link">
                                Xuất file PDF
                            </a>
                        </span>
                    <div class="box-body overflow-scroll">
                        <table>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Sản phẩm và giá trị</th>
                                    <th scope="col">Tình trạng</th>
                                    <th scope="col">Ngày mua</th>
                                    <th scope="col">Chi tiết</th>
                                </tr>
                            </thead>
                            @foreach($show_orderdetails as $show_orderdetail)
                            <tbody>
                                <tr>
                                    <!-- <td>#2345</td>
                                    <td>
                                        <div class="order-owner">
                                            <img src="./images/user-image.jpg" alt="user image">
                                            <span>tuat tran anh</span>
                                        </div>
                                    </td>
                                    <td>2021-05-09</td>
                                    <td>
                                        <span class="order-status order-ready">
                                            Ready
                                        </span>
                                    </td>
                                    <td>
                                        <div class="payment-status payment-pending">
                                            <div class="dot"></div>
                                            <span>Pending</span>
                                        </div>
                                    </td>
                                    <td>$123.45</td> -->
                                    <td>{{$show_orderdetail->id}}</td>
                               
                                    <td>{{$show_orderdetail->full_name}} </td>
                                    <td>
                                        @foreach($show_orderdetail->product_order as $product)
                                           {{$product->pivot->qty}} x {{$product->name}} -  {{number_format($product->pivot->total)}} VND<br>
                                        @endforeach
                                    </td>

                                    <!-- <td>
                                    @foreach ($show_orderdetail->product_order as $product_order)
                                        {{$product_order->pivot->qty}}<br>
                                    @endforeach
                                    </td> -->
                                    <td>  <div class="payment-status payment-pending">
                                            <div class="dot"></div>
                                            <span> @if ($show_orderdetail->check_shipping == 1)
                                                @if ($show_orderdetail->transport == 1)
                                                
                                                <a>Đã giao hàng</a>
                                                @else 
                                                    <a>Đang vận chuyển</a>
                                                @endif
                                            @else 
                                                <a>Chưa duyệt</a>
                                            @endif</span>
                                        </div>
                                           
                                        </td>
                                    <td>{{$show_orderdetail->created_at}} </td>
                                    <td>
                                        <span class="order-status order-ready">
                                            <a href="./info-order/{{$show_orderdetail->id}}" class="tm-product-delete-link">
                                                <i class="far fa-eye tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                    </td>
                                </tr>
                               
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                <!-- END ORDERS TABLE -->
            </div>
            <div class="col-12">
                <!-- TOP PRODUCT -->
                <div class="box f-height">
                    <div class="box-header">
                        Sản phẩm gần hết hàng
                    </div>
                    <div class="box-body">
                        @foreach($over_products as $over_product)
                        <ul class="product-list">
                            <li class="product-list-item">
                                <div class="item-info">
                                    <div class="item-name">
                                        <div class="product-name">Tên sản phẩm: {{$over_product->name}}</div>
                                    </div>
                                </div>
                                <div class="item-sale-info">
                                    <div class="product-sales">Số lượng còn lại: {{$over_product->qty}}</div>
                                </div>
                                <div class="item-sale-info">
                                    <div class="product-sales">Giá nhập: {{number_format($over_product->investment)}} VND</div>
                                </div>
                                <div class="item-sale-info">
                                    <div class="product-sales">Giá bán: {{number_format($over_product->price)}} VND</div>
                                </div>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
                <!-- TOP PRODUCT -->
            </div>
        </div>
    </div>
</div>

      @endsection