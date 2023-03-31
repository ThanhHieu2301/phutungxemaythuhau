@extends('dashboard.layout.master-shipper')

@section('title', 'Vận chuyển đơn hàng')

@section('body')
<div class="dash-content">
        <div class="main-content">
           <div class="row">
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                        Vận chuyển đơn hàng
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                            <!-- <div class="">
                                <form action="show_account">
                                    <input type="text" class="box" name="search_acc" style="color: black;" value="{{request('')}}" placeholder="Nhập tên tài khoản cần tìm" >
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div> -->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khách hàng</th>
                                        <th>Sản phẩm</th>
                                        <th>Ngày mua</th>
                                        <th>Trạng thái</th>
                                        <th>Tình trạng</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_orderdetails as $show_orderdetail)
                                <tbody>
                                    <tr>
                                        <td>{{$show_orderdetail->id}}</td>
                                        <td>{{$show_orderdetail->full_name}}</td>
                                        <td>
                                        @foreach($show_orderdetail->product_order as $product)
                                          {{$product->name}} <br>
                                        @endforeach
                                        </td>
                                        <td>{{$show_orderdetail->created_at}}</td>
                                        <td>
                                            @if ($show_orderdetail->check_shipping == 1)
                                                <a>Đã duyệt</a>
                                            @else 
                                                <a>Chưa duyệt</a>
                                            @endif
                                            </td>
                                        <td>
                                            @if ($show_orderdetail->transport == 1)
                                                <a>Đã giao hàng</a>
                                            @else 
                                                <a>Đang vận chuyển</a>
                                            @endif
                                            </td>
                                           <td>
                                        <span class="order-status order-ready">
                                            <a  href="./delete-checkorder/{{$show_orderdetail->id}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                        <span class="order-status order-ready">
                                            <a href="/transport/{{$show_orderdetail->id}}" class="tm-product-delete-link">
                                                <i class="fa fa-check tm-product-delete-icon"></i>
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


                        
@endsection


