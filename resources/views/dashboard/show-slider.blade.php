@extends('dashboard.layout.master3')

@section('title', 'Trang Slider')

@section('body')
<div class="dash-content">
        <div class="main-content">
                <div class="col-12">
                    <!-- ORDERS TABLE -->
                    <div class="box">
                        <div class="box-header">
                            Slide cho trang chủ
                        </div>
                        <div class="box-body overflow-scroll">
                        <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-slider'">Thêm slide mới</button>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ảnh slide</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                @foreach($show_sliders as $show_slider)
                                <tbody>
                                    <tr>
                                        <td><img style="height: 70px" src="{{url('')}}/{{$show_slider->image}}" alt=""></td>
                                        <td>{{$show_slider->title}}</td>
                                        <td>{{$show_slider->description}}</td>
                                        <td>
                                        <span class="order-status order-ready">
                                            <a  href="./delete-slider/{{$show_slider->id}}"  class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                        </span>
                                        <span class="order-status order-ready">
                                            <a href="/edit-slider/{{$show_slider->id}}" class="tm-product-delete-link">
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


