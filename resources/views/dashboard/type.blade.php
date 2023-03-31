
@extends('dashboard.layout.master3')

@section('title', 'Trang loại sản phẩm')

@section('body')
    <div class="dash-content">
        <div class="main-content">
           <div class="row">
               <div class="col-12">
                   <!-- ORDERS TABLE -->
                   <div class="box">
                       <div class="box-header">
                           Hãng sản xuất
                       </div>
                       <div class="">
                                <form action="type">
                                    <input type="text" class="box" name="search_brand" style="color: black;" value="{{request('')}}" placeholder="Nhập tên hãng cần tìm" >
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                           <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-brand'">Thêm hãng sản xuất</button>
                       <div class="box-body overflow-scroll">
                           <table>
                           
                               <thead>
                                   <tr>
                                        <th>#</th>
                                        <th>Ảnh hãng</th>
                                        <th>Tên hãng</th>
                                        <th>Ngày tạo</th>
                                   </tr>
                               </thead>
                               @foreach($show_brands as $show_brand)
                               <tbody>
                                   <tr>
                                       <td>{{$show_brand->id}}</td>
                                       <td><img style="height: 70px" src="{{url('')}}/{{$show_brand->image}}" alt=""></td>
                                       <td>{{$show_brand->name}}</td>
                                       <td>
                                           <span class="order-status order-ready">
                                                <a href="./delete-brand/{{$show_brand->id}}" class="tm-product-delete-link">
                                                    <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                                </a>
                                           </span>
                                           <span class="order-status order-ready">
                                            <a href="/edit-brand/{{$show_brand->id}}" class="tm-product-delete-link">
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
               <div class="col-12">
                   <!-- ORDERS TABLE -->
                   <div class="box">
                       <div class="box-header">
                           Loại sản phẩm
                       </div>
                       <div class="box-body overflow-scroll">
                           <table>
                           <div class="">
                                <form action="type">
                                    <input type="text" class="box" name="search_cate" style="color: black;" value="{{request('')}}" placeholder="Nhập tên loại sản phẩm cần tìm" >
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                           <button class="registerbtn" style="background-color:#ff7f00" onclick="location.href='./add-category'">Thêm loại sản phẩm</button>
                               <thead>
                                   <tr>
                                        <th>#</th>
                                        <th>Tên loại sản phẩm</th>
                                        <th>Chức năng</th>
                                   </tr>
                               </thead>
                               @foreach($pro_categories as $pro_category)
                               <tbody>
                                   <tr>
                                       <td>{{$pro_category->id}}</td>

                                       <td>{{$pro_category->name}}</td>
                                       <td>
                                       <span class="order-status order-ready">
                                            <a href="./delete-category/{{$pro_category->id}}" class="tm-product-delete-link">
                                                <i class="far fa-trash-alt tm-product-delete-icon"></i>
                                            </a>
                                       </span>
                                       <span class="order-status order-ready">
                                            <a href="/edit-category/{{$pro_category->id}}" class="tm-product-delete-link">
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
