@extends('dashboard.layout.master3')

@section('title', 'Trang tài khoản')

@section('body')
<div class="dash-content">
        <div class="main-content">
           <div class="row">
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Tài khoản nhân viên
                        </div>
                        <div class="box-body overflow-scroll">
                            <table>
                            <div class="">
                                <form action="show_account">
                                    <input type="text" class="box" name="search_acc" style="color: black;" value="{{request('')}}" placeholder="Nhập tên tài khoản cần tìm" >
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                            <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-admin'">Thêm nhân viên mới</button>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Số điện thoại</th>
                                        <th>Chức vụ</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_users as $show_user)
                                <tbody>
                                    <tr>
                                        <td>{{$show_user->id}}</td>
                                        <td>{{$show_user->name}}</td>
                                        <td>{{$show_user->email}}</td>
                                        <td>{{$show_user->phone}}</td>
                                        <td>{{$show_user->roles->name}}</td>
                                        <!-- <td>
                                            @if ($show_user->level == 1)
                                                <a>Quản lí</a>
                                            @elseif ($show_user->level == 2)
                                                <a>Chăm sóc khách hàng</a>
                                            @elseif ($show_user->level == 3)
                                                <a>Nhân viên giao hàng</a>
                                            @else 
                                                <a>Khách hàng</a>
                                            @endif
                                            </td>
                                        <td> -->
                                            <td>
                                        <span class="order-status order-ready">
                                            <a href="./delete-user/{{$show_user->id}}" class="tm-product-delete-link">
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


