@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('client/cart/show/css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
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
            <img style="display: block; margin-left: auto; margin-right: auto;" class="img"  src="{{ asset('images/success-order.jpg') }}" alt="">
            <div class="text-center">   
                <p class="fs-5 fw-bold ">Đặt hàng thành công!</p>
                <p class="text-success fs-6 fw-bold margin-bottom">Cảm ơn quý khách đã đặt hàng tại Unitop</p>
                <p class="text-success fs-6">Chúng tôi sẽ liên hệ quý khách để xác nhận đơn hàng trong thời gian sớm nhất</p>
                <p class="text-success fs-6">Xin chân thành cảm ơn</p>
                <a class="btn btn-primary" href="{{ route('client.home') }}" role="button">Trang chủ</a>
            </div>                      
        </div>
    </div>
@endsection

<style>
    .img {
    width: 300px;
    height: auto;
    object-fit: cover;
    }

    .margin-bottom {
        margin-bottom: 0px;
    }

</style>

@section('js')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
@endsection