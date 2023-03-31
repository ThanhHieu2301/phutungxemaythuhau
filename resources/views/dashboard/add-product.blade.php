@extends('dashboard.layout.master3')

@section('title', 'Thêm sản phẩm ')

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
                <form class="forms-sample" method="POST" enctype="multipart/form-data">
                        <div>
                        <div class="box-header">
                        Thêm sản phẩm mới
                        </div>
                        <hr>
                          <label for="email"><b>Tến sản phẩm</b></label>
                          <input type="text" id="exampleInputName1"  style=" color: black;" name="name" placeholder="Tên sản phẩm">
                          <div class="">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Trạng thái</label>
                                    <div class="col-sm-4">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="featured" value="1" checked> Hiện
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input type="radio" class="form-check-input" name="featured" value="0"> Ẩn
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                            <label for="email"><b>Số lượng</b></label>
                                            <input type="text" class="textarea" id="exampleInputName1" style=" color: black;" name="qty" placeholder="số lượng" min="1" required>
                                            <label for="email"><b>Giá nhập</b></label>
                                            <input type="text" class="textarea" id="exampleInputName1" style=" color: black;" name="investment" placeholder="Giá nhập" min="1" required>
                                            <label for="email"><b>Giá bán</b></label>
                                            <input type="text" class="textarea" id="exampleInputName1" style=" color: black;" name="price" placeholder="Giá bán" min="1" required>
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Hãng sản xuất</label>
                                            <select class="form-control" style="width:200px;border: 1px solid black; color: black;" name="brand_id" >
                                            @foreach($bras as $bra)
                                                <option value="{{$bra->id}}" name="brand_id">{{$bra->name}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        &nbsp;	&nbsp;
                                        <div class="form-group">
                                            <label for="exampleSelectGender">Loại sản phẩm</label>
                                            <select class="form-control" style="width:200px; border: 1px solid black; color: black;" name="product_category_id">
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}"  name="product_categoty_id">{{$cat->name}}</option>
                                            @endforeach

                                            </select>
                                        </div>
                                        &nbsp;	&nbsp;
                                        <div class="form-group">
                                            <label>Ảnh sản phẩm</label>
                                            <input type="file"  name="file_upload" class="form-control" id="upload" >
                                        </div>
                                        &nbsp;	&nbsp; 
                                    <div>
                                        <label for="email"><b>Mô tả</b></label>
                                        <textarea type="text" class="textarea" style="border: 1px solid black;" name="description" rows="4"></textarea>
                                    </div>
                                </div>
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
                       