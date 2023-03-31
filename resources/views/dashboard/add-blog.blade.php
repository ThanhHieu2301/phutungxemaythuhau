@extends('dashboard.layout.master3')

@section('title', 'Thêm bài viết ')

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
                            <div >
                            <div class="box-header">
                    Thêm bài viết mới
                        </div>
                        <hr>
                                <label for="email"><b>Tiêu đề</b></label>
                                <input type="text" id="exampleInputName1"  name="title" placeholder="Tiêu đề" required>
                                <div>
                                    <div class="form-group">
                                        <label for="exampleSelectGender"><b>Thể loại bài viết</b></label>
                                        <select class="form-control" style="width:200px;border: 1px solid black;" name="blog_category_id" >
                                        @foreach($blogcates as $blogcate)
                                            <option value="{{$blogcate->id}}" name="blog_category_id">{{$blogcate->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    &nbsp;	&nbsp;
                                    <!-- <div class="form-group">
                                        <label>Ảnh bài viết</label>
                                        <input type="file"  name="file_upload" class="form-control" id="upload" >
                                    </div> -->
                                    <div class="form-group">
                                        <label><b>Ảnh bài viết</b></label>
                                        <input type="file"  name="image" >
                                    </div>
                                    &nbsp;	&nbsp; 
                                    <div>
                                        <label for="email"><b>Nội dung chính</b></label>
                                        <textarea type="text" class="textarea" style="border: 1px solid black;" name="description" rows="4" required></textarea>
                                    </div>
                                    <label for="email"><b>Lời kết</b></label>
                                    <input type="text" class="textarea" id="exampleInputName1" name="content" placeholder="Lời kết" required>
                                </div>
                            </div>
                            <button type="submit" style="background-color:#ff7f00" class="registerbtn">Xác nhận</button>
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
      @endsection
                       