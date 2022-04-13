@extends('layouts.master')

@section('content')
<div id="main-content-wp" class="clearfix detail-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">sản phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="detail-product-wp">
                <div class="section-detail clearfix">
                    <div class="thumb-wp fl-left">
                        <a href="" title="" id="main-thumb">
                            <img  src="{{ asset($product->feature_image_path) }}"/>
                        </a>
                        <div id="list-thumb">
                            <a href="">
                                <img  src="{{ asset($product->feature_image_path) }}"/>
                            </a>
                        </div>
                    </div>
                    <div class="thumb-respon-wp fl-left">
                        <img src="public/images/img-pro-01.png" alt="">
                    </div>
                    <div class="info fl-right">
                        <h3 class="product-name">{{ $product->name }}</h3>
                        <div class="desc">
                            @if ($infoProduct)
                                {!! $infoProduct->information  !!}
                            @else
                                <p>sản phẩm đang cập nhật thông tin</p>
                            @endif
                           
                        </div>
                        <div class="num-product">
                            <span class="title">Sản phẩm: </span>
                            <span class="status">Còn hàng</span>
                        </div>
                        <p class="price">{{ number_format($product->price) }}đ</p>
                        <div id="num-order-wp">
                            <a title="" id="minus"><i class="fa fa-minus"></i></a>
                            <input type="text" name="num-order" value="1" id="num-order">
                            <a title="" id="plus"><i class="fa fa-plus"></i></a>
                        </div>
                        <a href="{{ route('cart.add', $product->id) }}" title="Thêm giỏ hàng" class="add-cart">Mua ngay</a>
                    </div>
                </div>
            </div>
            <div class="section" id="post-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Mô tả sản phẩm</h3>
                </div>
                <div class="section-detail">
                   {!! $product->content !!}
                </div>
            </div>
            <div class="section" id="same-category-wp">
                <div class="section-head">
                    <h3 class="section-title">Cùng chuyên mục</h3>
                </div>
                <div class="section-detail">
                    <ul class="list-item">
                        @foreach ($sameSlugProduct as $product)
                            <li>                                                                            
                                <a href="" title="" class="thumb">
                                    <img src="{{ asset($product->feature_image_path) }}">
                                </a>
                                <a href="" title="" class="product-name">{{ $product->name }}</a>
                                <div class="price">
                                    <span class="new">{{ number_format($product->price) }}đ</span>
                                    <span class="old">{{ number_format($product->price) }}đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="" title="" class="buy-now fl-right">Mua ngay</a>
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

