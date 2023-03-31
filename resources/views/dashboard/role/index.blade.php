@extends('dashboard.layout.master3')

@section('title', 'Trang quyền của nhân viên')

@section('body')
<div class="dash-content">
        <div class="main-content">
           <div class="row">
           <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Các chức vụ của nhân viên
                        </div>
                        <div class="box-body overflow-scroll">
                        <div class="">
                                <form action="role">
                                    <input type="text" class="box" name="search_role" style="color: black;" value="{{request('')}}" placeholder="Nhập tên chức vụ cần tìm" >
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-role'">Thêm chức vụ mới</button>
                            <table>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên quyền</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($datas as $model)
                                <tbody>
                                    <tr>
                                        <td>{{$model->id}}</td>
                                        <td>{{$model->name}}</td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a href="./delete-role/{{$model->id}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                        <span class="order-status order-ready">
                                            <a href="/edit-role/{{$model->id}}" class="tm-product-delete-link">
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
                    <!-- END ORDERS TABLE -->
                </div>
           </div>
        </div>
</div>


                        
@endsection


