@extends('dashboard.layout.master3')

@section('title', 'Tài khoản khách hàng')

@section('body')
<div class="dash-content">
        <div class="main-content">
           <div class="row">
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Tài khoản của khách hàng
                        </div>
                    
                        <div class="box-body overflow-scroll">
                            <form action="comment">
                                <input type="text" class="box" name="search_ad_comment" style="color: black;" value="{{request('')}}" placeholder="Nhập tên khách hàng cần tìm" >
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khách hàng</th>
                                        <th>Email</th>
                                        <th>Trạng thái</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_customers as $show_customer)
                                <tbody>
                                    <tr>
                                        <td>{{$show_customer->id}}</td>
                                        <td>{{$show_customer->name}}</td>
                                        <td>{{$show_customer->email}}</td>
                                          <td>
                                            @if ($show_customer->status == 1)
                                                <a>Đã kích hoạt</a>
                                            @else 
                                                <a>Chưa kích hoạt</a>
                                            @endif
                                            </td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a  href="./delete-customer/{{$show_customer->id}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
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


