@extends('dashboard.layout.master3')

@section('title', 'Sửa bài viết  ')

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
                            Thông tin bài viết
                        </div>
                            <hr>
                            <div>
                                <label><b>Tiêu đề</b></label>
                                <input type="text" id="exampleInputName1" name="title" style="color: black;" value="{{$blogs['title']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectGender">Loại sản phẩm</label>
                                <select class="form-control" style="width:200px;color: black;border: 1px solid black;" name="blog_category_id" >
                                @foreach($blogcates as $blogcate)
                                    <option value="{{$blogcate->id}}" {{$blogs->blog_category_id == $blogcate->id ? 'selected': ''}} name="blog_category_id">{{$blogcate->name}}</option>
                                @endforeach
                                </select>
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <label for="exampleSelectGender">Ảnh bài viết</label>
                                <input type="file" id="exampleInputName1" name="image">
                                <i>Chú thích: Thêm ảnh mới nếu bạn muốn</i>
                                <br><br>
                                    @if($blogs->image)
                                        <img  src="{{url('')}}/{{$blogs->image}}" alt="">
                                    @endif  
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <div>
                                    <label for="email"><b>Nội dung chính</b></label>
                                    <textarea type="text" class="textarea" name="description" style="width: 100%;border: 1px solid black;" rows="3" value="{!!nl2br($blogs->description)!!}"></textarea>
                                </div>
                            </div>
                                        &nbsp;	&nbsp; 
                            <div>
                                <label>Lời kết</label>
                                <input type="text" id="exampleInputName1" name="content" style="color: black;" value="{{$blogs['content']}}">
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



  