@extends('dashboard.layout.master3')

@section('title', 'Sửa Slide ảnh  ')

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
                           Thông tin slide ảnh
                        </div>
                            <div>
                                <label><b>Tiêu đề</b></label>
                                <input type="text" id="exampleInputName1" name="title" style="color: black;" value="{{$sliders['title']}}">
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <label for="exampleSelectGender"><b>Ảnh slide</b></label>
                                <input type="file" id="exampleInputName1" name="image">
                                <i>Chú thích: Thêm ảnh mới nếu bạn muốn</i>
                                <br><br>
                                    @if($sliders->image)
                                        <img  src="{{url('')}}/{{$sliders->image}}" alt="">
                                    @endif  
                            </div>
                            &nbsp;	&nbsp; 
                            <div>
                                <div>
                                        <label for="email"><b>Nội dung chính</b></label>
                                        <textarea type="text" class="textarea" name="description" style="width: 100%;" rows="4" value="{!!nl2br($sliders->description)!!}"></textarea>
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



  