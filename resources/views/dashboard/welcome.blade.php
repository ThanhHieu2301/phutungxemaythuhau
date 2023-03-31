@extends('dashboard.layout.master3')

@section('title', 'Chào mừng đến với trang quản lí')

@section('body')
<style>
body, html {
  height: 100%;
  margin: 0;
}

.bgimg {
  height: 100%;
  background-position: center;
  background-size: cover;
  /* position: relative;
  color: white; */
  font-family: "Courier New", Courier, monospace;
  font-size: 25px;
}

.topleft {
  position: absolute;
  top: 0;
  left: 16px;
}

.bottomleft {
  position: absolute;
  bottom: 0;
  left: 16px;
}

.middle {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

hr {
  margin: auto;
  width: 40%;
}
</style>
<div class="dash-content">
      <div class="main-content">
      <img src="front/img/2.gif" style="padding-right: 80%;" alt="">
      <img src="front/img/hi.gif" style="padding-left: 80%;" alt="">
          <div class="bgimg">
            <!-- <div class="topleft">
              <p>Logo</p>
            </div> -->
            <div class="middle">
              <img src="front/img/hello.gif" alt="">
              <h1>Chào mừng {{Auth::user()->name}}</h1>
              <hr>
              <p>Chúc bạn một ngày tốt lành</p>
            </div>
          </div>
          
      </div>
</div>


                        
@endsection


