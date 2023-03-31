@extends('dashboard.layout.master3')

@section('title', 'Thêm bảo hành sản phẩm')

@section('body')
<style>
    .textarea{
        width: 100%;
    }
</style>
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
                            Thêm bảo hành sản phẩm
                        </div>
                        <hr>
                            <div>
                                <label><b>Mã số bảo hành</b></label>
                                <input type="text" id="exampleInputName1" name="barcode" placeholder="Mã bảo hành" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender"><b>Loại sản phẩm</b></label>
                                <select class="form-control" style="width:200px;color:black;border: 1px solid black;" name="category_id" >
                                @foreach($cates as $cate)
                                    <option value="{{$cate->id}}" name="category_id">{{$cate->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <label><b>Ngày bảo hành</b></label>
                                <input type="date" name="time_start" class="box" id="exampleInputName1" style="background-color: white; height:40px" >
                            </div>
                                        &nbsp;	&nbsp; 
                            <div>
                                <label><b>Ngày hết hạn bảo hành</b></label>
                                <input type="date" name="time_end" class="box" id="exampleInputName1" style="background-color: white; height:40px" >
                            </div>
                            <button type="submit" style="background-color:#ff7f00" class="registerbtn">Xác nhận</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      @endsection
                       