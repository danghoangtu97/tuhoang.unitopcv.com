@extends('layouts.master')

@section('content')
<div id="main-content-wp" class="home-page clearfix">
    <div class="wp-inner">
        <div class="main-content fl-right">
            <div class="section" id="slider-wp">
                <div class="section-detail">
                    @foreach ($sliders as $slider)
                        <div class="item">
                            <img src="{{ asset($slider->image_path) }}" alt="">
                        </div>
                    @endforeach                
                </div>
            </div>
            <div class="section" id="support-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <div class="thumb">
                                <img src="{{ asset('ismart/public/images/icon-1.png') }}">
                            </div>
                            <h3 class="title">Miễn phí vận chuyển</h3>
                            <p class="desc">Tới tận tay khách hàng</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{ asset('ismart/public/images/icon-2.png') }}">
                            </div>
                            <h3 class="title">Tư vấn 24/7</h3>
                            <p class="desc">1900.9999</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{ asset('ismart/public/images/icon-3.png') }}">
                            </div>
                            <h3 class="title">Tiết kiệm hơn</h3>
                            <p class="desc">Với nhiều ưu đãi cực lớn</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{ asset('ismart/public/images/icon-4.png') }}">
                            </div>
                            <h3 class="title">Thanh toán nhanh</h3>
                            <p class="desc">Hỗ trợ nhiều hình thức</p>
                        </li>
                        <li>
                            <div class="thumb">
                                <img src="{{ asset('ismart/public/images/icon-5.png') }}">
                            </div>
                            <h3 class="title">Đặt hàng online</h3>
                            <p class="desc">Thao tác đơn giản</p>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="section" id="feature-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Sản phẩm nổi bật</h3> 
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($productHighlights as $product)
                            <li>
                                <a href="{{ route('client.detailProduct', $product->id) }}" title="" class="thumb">
                                    <img src="{{ asset($product->feature_image_path) }}">
                                </a>
                                <a href="{{ route('client.detailProduct', $product->id) }}" title="" class="product-name">{{ $product->name }}</a>
                                <div class="price">
                                    <span class="new">{{ number_format($product->price) }}đ</span>
                                    <span class="old">6.190.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="" data-url="{{ route('cart.addToCart', $product->id) }}" title="" class="add-cart add_to_cart fl-left">Thêm giỏ hàng</a>
                                    <a href="{{ route('cart.add', $product->id) }}" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        @endforeach                       
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Điện thoại</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach ($listPhone as $phone) 
                            <li>
                                <a href="{{ route('client.detailProduct', $phone->id) }}" title="" class="thumb">
                                    <img src="{{ asset($phone->feature_image_path) }}">
                                </a>
                                <a href="{{ route('client.detailProduct', $phone->id) }}" title="" class="product-name">{{ $phone->name }}</a>
                                    
                                <div class="price">
                                    <span class="new">{{ number_format($phone->price) }}đ</span>
                                    <span class="old">{{ number_format($phone->price) }}đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="" data-url="{{ route('cart.addToCart', $phone->id) }}" title="Thêm giỏ hàng" class="add-cart add_to_cart fl-left">Thêm
                                        giỏ hàng</a>
                                    <a href="{{ route('cart.add', $phone->id) }}" title="Mua ngay" class="buy-now fl-right">Mua
                                        ngay</a>
                                </div>
                            </li>
                        @endforeach                       
                    </ul>
                </div>
            </div>
            <div class="section" id="list-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Laptop</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        @foreach ($listLaptop as $laptop) 
                        <li>
                            <a href="{{ route('client.detailProduct', $laptop->id) }}" title="" class="thumb">
                                <img src="{{ asset($laptop->feature_image_path) }}">
                            </a>
                            <a href="{{ route('client.detailProduct', $laptop->id) }}" title="" class="product-name">{{ $laptop->name }}</a>
                                
                            <div class="price">
                                <span class="new">{{ number_format($laptop->price) }}đ</span>
                                <span class="old">8.990.000đđ</span>
                            </div>
                            <div class="action clearfix"> 
                                <a href="" data-url="{{ route('cart.addToCart', $laptop->id) }}" title="Thêm giỏ hàng" class="add-cart add_to_cart fl-left">Thêm
                                    giỏ hàng</a>
                                <a href="{{ route('cart.add', $laptop->id) }}" title="Mua ngay" class="buy-now fl-right">Mua
                                    ngay</a>
                            </div>
                        </li>
                    @endforeach           
                    </ul>
                </div>
            </div>
        </div>

        @include('partials.client.sidebarHome')
    </div>
</div>
@endsection