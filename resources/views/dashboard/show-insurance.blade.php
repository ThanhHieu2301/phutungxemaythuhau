@extends('dashboard.layout.master3')

@section('title', 'Trang bảo hành sản phẩm')

@section('body')
<div class="dash-content">
        <div class="main-content">
           <div class="row">
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Bảo hành sản phẩm
                        </div>
                        <div class="box-body overflow-scroll">
                            <form action="show-insurance">
                                <input type="text" class="box" name="search_ad_insurance" style="color: black;" value="{{request('')}}" placeholder="Nhập mã bảo hành cần tìm" >
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                        <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-insurance'">Thêm bảo hành mới</button>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Loại sản phẩm</th>
                                        <th>Mã bảo hành</th>
                                        <th>Ngày bảo hành</th>
                                        <th>Ngày hết bảo hành</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_insurances as $show_insurance)
                                <tbody>
                                    <tr>
                                        <td>{{$show_insurance->id}}</td>
                                        <td>{{$show_insurance->productInsurance->name}}</td>
                                        <td>{{$show_insurance->barcode}}</td>
                                        <td>{{$show_insurance->time_start}}</td>
                                        <td>{{$show_insurance->time_end}}</td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a href="./delete-insurance/{{$show_insurance->id}}"class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                        <span class="order-status order-ready">
                                            <a href="/edit-insurance/{{$show_insurance->id}}" class="tm-product-delete-link">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </span>
                                        </td>
                                    </tr>
                                  
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
           </div>
        </div>
</div>


                        
@endsection


