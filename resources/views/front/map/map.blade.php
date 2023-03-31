@extends('front.layout.master')

@section('title', 'Về chúng tôi')

@section('body')

        <div class="breadcrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="index.php"><i class="fa fa-home"> Trang Chủ</i></a>
                            <span>Bản đồ</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="map spad">
            <div class="container">
                <div class="map-inner">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1947.6121799310517!2d109.10454865814089!3d12.501282816409741!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31703fbe8fb47735%3A0x12c253b141762c2c!2zUGjhu6UgVMO5bmcgWGUgZ-G6r24gbcOheSBUaHUgSOG6rXU!5e0!3m2!1svi!2s!4v1654486182614!5m2!1svi!2s" 
                        width="1200" height="610" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                    <div class="icon">
                        <i class="fa fa-map-market"></i>
                    </div>
                </div>
            </div>
        </div>
        <section class="contact-section spad">
            <section class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="contact-title">
                            <h4>Liên hệ chúng tôi</h4>
                            <p>Cửa hàng phụ tung Thu Hậu chỉ mới xuất hiện cách đây vài năm nhưng được nhiều thợ sửa và khách đi đường đến mua hàng và có rất nhiều phản hồi tốt.
                                Cửa hàng được liên kết cùng nhiều nhà phân phối lớn, đảm bảo chất lượng và giá cả đúng với giá thị trường.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 offset-lg-1">
                        <div class="contact-widget">
                            <div class="cw-item">
                                <div class="ci-icon">
                                    <i class="ti-location-pin"></i>
                                </div>
                                <div class="ci-text">
                                    <span>Địa chỉ</span>
                                    <p>Xuân Hòa 2 - Ninh Phụng - Ninh Hòa - Khánh Hòa</p>
                                </div>
                           </div>
                           <div class="cw-item">
                                <div class="ci-icon">
                                    <i class="ti-mobile"></i>
                                </div>
                                <div class="ci-text">
                                    <span>Điện thoại</span>
                                    <p>0905014661</p>
                                </div>
                           </div>
                           <div class="cw-item">
                                <div class="ci-icon">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="ci-text">
                                    <span>Email</span>
                                    <p>phutungthuhau@gmail.com</p>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
        @endsection
