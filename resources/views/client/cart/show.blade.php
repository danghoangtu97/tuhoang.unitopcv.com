@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('client/cart/show/css/style.css') }}">   
@endsection

@section('content')
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Sản phẩm làm đẹp da</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            @if (Cart::count() > 0)
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">
                        <form action="{{ route('cart.update') }}" method="POST">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>Mã sản phẩm</td>
                                        <td>Ảnh sản phẩm</td>
                                        <td>Tên sản phẩm</td>
                                        <td>Giá sản phẩm</td>
                                        <td>Số lượng</td>
                                        <td colspan="2">Thành tiền</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @csrf
                                    @foreach (Cart::content() as $item)
                                        <tr id="cartItem_{{ $item->id }}">
                                            <td>
                                                <a href="" title="" class="thumb">
                                                    <img src="{{ asset($item->options->thumbnail) }}" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" title="" class="name-product">{{ $item->name }}</a>
                                            </td>
                                            <td>{{ number_format($item->price) }}đ</td>
                                            <td>
                                                <input type="number" name="qty[{{ $item->rowId }}]"
                                                    value="{{ $item->qty }}" class="num-order">
                                            </td>
                                            <td>{{ number_format($item->total) }}đ</td>
                                            <td>
                                                <a href="{{ route('cart.remove', $item->rowId) }}" title="" class="del-product"><i
                                                        class="fa fa-trash-o"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="7">
                                            <div class="clearfix">
                                                <p id="total-price" class="fl-right">Tổng giá:
                                                    <span>{{ Cart::total() }}đ</span>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="7">
                                            <div class="clearfix">
                                                <div class="fl-right">
                                                    <input id="update-cart" type="submit" name="btn_update"
                                                        value="Cập nhật giỏ hàng">
                                                    <a href="{{ route('cart.checkout') }}" title="" id="checkout-cart">Thanh toán</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào
                            số
                            lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.
                        </p>
                        <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br />
                        <a href="{{ route('cart.destroy') }}" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>
            @else
                <img style="display: block; margin-left: auto; margin-right: auto;"
                    src="{{ asset('images/no-cart.png') }}" alt="">
                <p class="fontsize">Ấn vào đây để mua sản phẩm <a href="{{ route('client.home') }}">Mua
                        ngay</a>
                </p>
            @endif
        </div>
    </div>
@endsection
