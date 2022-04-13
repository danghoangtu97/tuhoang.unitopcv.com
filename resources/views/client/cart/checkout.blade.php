@extends('layouts.master')

@section('content')
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a> 
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <form action="{{ route('cart.payment') }}" method="POST">
            @csrf
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <div class="section-detail">
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="fullname">Họ tên (*)</label>
                                <input type="text" name="fullName" id="fullname">
                                @error('fullName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col fl-right">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                            </div>
                        </div>
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="address">Địa chỉ (*)</label>
                                <input type="text" name="address" id="address">
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-col fl-right">
                                <label for="phone">Số điện thoại (*)</label>
                                <input type="tel" name="phone_number" id="phone">
                                @error('phone_number')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label for="notes">Ghi chú</label>
                                <textarea name="note"></textarea>
                            </div>
                        </div>
                </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr class="cart-item">
                                <td class="product-name">{{ $item->name }}<strong class="product-quantity">x {{ $item->qty }}</strong></td>
                                <td class="product-total">{{ number_format($item->price) }}đ</td>
                            </tr>
                            @endforeach                         
                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price">{{ Cart::total() }}đ</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="payment-checkout-wp"> 
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment-method" value="thanh toán online">
                                <label for="direct-payment">Thanh toán online</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-home" name="payment-method" value="Thanh toán tại nhà">
                                <label for="payment-home">Thanh toán tại nhà</label>
                            </li>
                        </ul>
                        @error('payment-method')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="place-order-wp clearfix">
                        <input type="submit" id="order-now" name="btn" value="Đặt hàng">
                    </div>
                </div>
            </div>
        </form>   
    </div>
</div>
@endsection

<style>
    .display-none{
        display: none;
    }
</style>