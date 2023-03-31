@extends('front.layout.master')

@section('title', 'Sản phẩm')

@section('body')


<!-- đường dẫn -->
<div class="breadcrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="index.php"><i class="fa fa-home"> Trang Chủ</i></a>
                    <span>Sản phẩm</span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="product-shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
               @include ('front\shop\commponents\products-sidebar-filter')
            </div>
            <!-- show product -->
            <div class="col-lg-9 order-1 order-lg-2 ">
                <div class="product-show-option">
                    <div class="row">
                        <div class="col-lg-7 col-md-7">
                            <form action="">
                                <div class="select-option">
                                    <select name="sort_by" class="sorting" onchange="this.form.submit();">
                                        <option {{ request('sort_by') == 'lastest' ? 'selected' : '' }} value="lastest">Mới nhất</option>
                                        <option {{ request('sort_by') == 'oldest' ? 'selected' : '' }} value="oldest">Cũ nhất</option>
                                        <option {{ request('sort_by') == 'nameaz' ? 'selected' : '' }} value="nameaz">Từ A - Z</option>
                                        <option {{ request('sort_by') == 'nameza' ? 'selected' : '' }} value="nameza">Từ Z - A</option>
                                        <option {{ request('sort_by') == 'pricelow' ? 'selected' : '' }} value="pricelow">Giá thấp đến cao</option>
                                        <option {{ request('sort_by') == 'pricehigh' ? 'selected' : '' }} value="pricehigh">Giá cao đến thấp</option>
                                    </select>
                                    <select name="show" class="p-show" onchange="this.form.submit();">
                                        <option {{ request('show') == '6' ? 'selected' : '' }} value="6">Hiển thị: 6 sản phẩm</option>
                                        <option {{ request('show') == '9' ? 'selected' : '' }} value="9">Hiển thị: 9 sản phẩm</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product-list">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-lg-4 col-sm-6">
                                @include('front.components.product-item')
                            </div>
                        @endforeach
                    </div>
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
</section>
@endsection
