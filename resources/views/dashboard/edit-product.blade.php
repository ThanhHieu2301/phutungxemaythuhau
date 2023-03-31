@extends('dashboard.layout.master3')

@section('title', 'Trang chi tiết sản phẩm')

@section('body')
<div class="dash-content">
<div class="main-content">
           <div class="row">
               <div class="col-12">
                   <!-- ORDERS TABLE -->
                   <div class="box">
                   @include('front.auth.alert')
                        <form class="forms-sample" method="POST">
                           <div>
                           <div class="box-header">
                           Thông tin sản phẩm
                        </div>
                        <hr>
                            <div>
                                <label><b>Tến sản phẩm</b></label>
                                <input type="text" id="exampleInputName1" name="name" style="color: black;" value="{{$datas['name']}}">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Trạng thái</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="featured" value="1" {{$datas->featured == 1 ? 'checked=""' : ''}}> Hiện
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="featured" value="0"  {{$datas->featured == 0 ? 'checked=""' : ''}}> Ẩn
                                        </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <label><b>Số lượng</b></label>
                                <input type="text" id="exampleInputName1" name="qty" style="color: black;" value="{{$datas['qty']}}">
                            </div>
                            <div>
                                <label><b>Giá nhấp</b></label>
                                <input type="text" id="exampleInputName1" name="investment" style="color: black;" value="{{$datas['price']}}">
                            </div>
                            <div>
                                <label><b>Giá bán</b></label>
                                <input type="text" id="exampleInputName1" name="price" style="color: black;" value="{{$datas['price']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Hãng sản xuất</label>
                                <select class="form-control" style="width:200px;color: black;border: 1px solid black; " name="brand_id" >
                                    @foreach($cats as $cat)
                                        <option value="{{$cat->id}}" {{$datas->brand_id== $cat->id ? 'selected': ''}} name="brand_id">{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;	&nbsp; 
                            <div class="form-group">
                                <label for="exampleSelectGender">Loại sản phẩm</label>
                                <select class="form-control" style="width:200px;color: black;border: 1px solid black; " name="product_category_id" >
                                    @foreach($bras as $bra)
                                        <option value="{{$bra->id}}" {{$datas->product_category_id == $bra->id ? 'selected': ''}} name="product_category_id">{{$bra->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <label for="exampleSelectGender">Ảnh sản phẩm</label>
                                <input type="file" id="exampleInputName1" name="image">
                                <i>Chú thích: Thêm ảnh mới nếu bạn muốn</i>
                                <br><br>
                                    @if($datas->image)
                                        <img  src="front/img/products/{{$datas->image}}" alt="">
                                    @endif  
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <div>
                                        <label for="email"><b>Mô tả</b></label>
                                        <textarea type="text" class="textarea" name="description" style="width: 100%; color:black;border: 1px solid black; " rows="3" >{!!nl2br($datas->description)!!}</textarea>
                                    </div>
                            </div>
                                        &nbsp;	&nbsp; 
                            <button type="submit" style="background-color:#ff7f00" class="registerbtn">Xác nhận</button>
                        </div>
                           @csrf
                         </form>
                   </div>
                   <!-- END ORDERS TABLE -->
               </div>
           </div>
           </div>
       </div>

@endsection
