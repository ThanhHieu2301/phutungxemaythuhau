@extends('dashboard.layout.master3')

@section('title', 'Trang sản phẩm')

@section('body')
    <div class="dash-content">
        <div class="main-content">
           <div class="row">
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Sản phẩm của cửa hàng
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                            <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-product'">Thêm sản phẩm mới</button>
                            <span class="order-status order-ready">
                                            <a href="{{route('exportpdf')}}" class="tm-product-delete-link">
                                               Xuất file PDF
                                            </a>
                                        </span>
                                <thead>
                                    <tr>
                                        <th scope="col">Ảnh sản phẩm</th>
                                        <th scope="col">Tên sản phẩm</th>
                                        <th scope="col">Giá nhập</th>
                                        <th scope="col">Giá bán</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng</th>
                                        <th scope="col">Ngày tạo</th>
                                        <th scope="col">Chức năng</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @foreach($show_products as $show_product)
                                    <tr>
                                        <td><img style="height: 70px" src="front/img/products/{{$show_product->image}}"></td>
                                        <td class="tm-product-name"><a >{{$show_product->name}}</a></td>
                                        <td>{{number_format($show_product->investment )}} VND</td>
                                        <td>{{number_format($show_product->price )}} VND</td>
                                        <td>{{$show_product->qty}}</td>
                                        <td>{{number_format($show_product->price * $show_product->qty)}}</td>
                                        <td>{{$show_product->created_at}}</td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a href="./delete-product/{{$show_product->id}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                        <span class="order-status order-ready">
                                            <a href="/edit-product/{{$show_product->id}}" class="tm-product-delete-link">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </span>
                                        </td>
                                    </tr>

                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            <div style="position:sticky;">{!!$show_products->links()!!}</div>
                            <br>
                        </div>
                    </div>

                    <!-- END ORDERS TABLE -->
                </div>
           </div>
        </div>
    </div>
@endsection
