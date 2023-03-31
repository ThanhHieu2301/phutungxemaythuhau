@extends('dashboard.layout.master3')

@section('title', 'Sửa thể loại bài viết ')

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
                            Thông tin thể loại bài viết
                        </div>
                             <hr>
                         
                             <label for="email"><b>Tên thể loại</b></label>
                             <input type="text" id="exampleInputName1" style="color: black;" name="name" value="{{$blog_categories['name']}}">
                         
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



  