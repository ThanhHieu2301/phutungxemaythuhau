@extends('front.layout.master')

@section('title', 'Xác nhận')

@section('body')

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="./"><i class="fa fa-home"> Trang Chủ</i></a>
                            <a href="./checkout">Thanh Toán</a>
                            <span>Hoàn thành thanh Toán</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="checkout-section spad">
            <div class="container">
               <div class="col-lg-12">
                    <h4>
                        {{$notification}}
                    </h4>
                    <a href="./" class="primary-btn mt-5">Tiếp tục mua hàng</a>
               </div>
            </div>
        </div>


@endsection