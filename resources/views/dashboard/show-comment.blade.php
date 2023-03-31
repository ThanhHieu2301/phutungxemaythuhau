@extends('dashboard.layout.master3')

@section('title', 'Trang bình luận của khách hàng')

@section('body')
<div class="dash-content">
        <div class="main-content">
           <div class="row">
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Bình luận của khách hàng
                        </div>
                    
                        <div class="box-body overflow-scroll">
                            <form action="comment">
                                <input type="text" class="box" name="search_ad_comment" style="color: black;" value="{{request('')}}" placeholder="Nhập bình luận cần tìm" >
                                <button type="submit"><i class="ti-search"></i></button>
                            </form>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Nội dung</th>
                                        <th>Đánh giá</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_comments as $show_comment)
                                <tbody>
                                    <tr>
                                        <td>{{$show_comment->id}}</td>
                                        <td>{{$show_comment->name}}</td>
                                        <td>{{$show_comment->product->name}}</td>
                                        <td>{{$show_comment->messages}}</td>
                                        <td>{{$show_comment->rating}}</td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a  href="./delete-comment/{{$show_comment->id}}" class="tm-product-delete-link">
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


