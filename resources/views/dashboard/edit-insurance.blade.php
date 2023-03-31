@extends('dashboard.layout.master3')

@section('title', 'Sửa bảo hành sản phẩm ')

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
                           Thông tin bảo hành
                        </div>
                        <hr>
                            <div>
                                <label><b>Mã số bảo hành</b></label>
                                <input type="text" id="exampleInputName1" name="barcode" style="color: black;" value="{{$insurances['barcode']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender"><b>Loại sản phẩm</b></label>
                                <select class="form-control" style="width:200px;color: black;border: 1px solid black;" name="category_id" >
                                @foreach($cates as $cate)
                                    <option value="{{$cate->id}}" {{$insurances->category_id == $cate->id ? 'selected': ''}} name="category_id">{{$cate->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <label><b>Ngày bảo hành</b></label>
                                <input type="date" name="time_start" class="box" id="exampleInputName1" style="background-color: white; height:40px;color: black;" value="{{$insurances['time_start']}}">
                            </div>
                                        &nbsp;	&nbsp; 
                            <div>
                                <label><b>Ngày hết hạn bảo hành</b></label>
                                <input type="date" name="time_end" class="box" id="exampleInputName1" style="background-color: white; height:40px;color: black;"  value="{{$insurances['time_end']}}">
                            </div>
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



  