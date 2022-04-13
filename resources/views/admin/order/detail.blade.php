@extends('layouts.admin')

@section('title')
    <title>Trang chủ</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', ['name' => 'Order', 'key' => 'list'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h6>Thông tin khách hàng</h6>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Họ và tên</th>
                                    <th scope="col">Mã đơn hàng</th>
                                    <th scope="col">Số điện thoại</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Thời gian đặt hàng</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $order->customer->name }}</td>
                                    <td>{{ $order->code }}</td>
                                    <td>{{ $order->customer->phone_number }}</td>
                                    <td>{{ $order->customer->address }}</td>
                                    <td>{{ $order->customer->email }}</td>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <form action="{{ route('order.update', $order->id) }}" method="POST">
                            @csrf
                            <div class="col-4 my-1 mt-4">
                                <label class="mr-sm-2">Trạng thái đơn hàng</label>
                                <select class="custom-select mr-sm-2" name="status">
                                    <option>chọn trạng thái</option>
                                    <option
                                        {{ $order->status == "<span class='badge badge-warning font-status'>Đang xử lý</span>" ? 'selected' : '' }}
                                        value="<span class='badge badge-warning font-status'>Đang xử lý</span>">Đang xử lý
                                    </option>
                                    <option
                                        {{ $order->status == "<span class='badge badge-primary font-status'>Đang giao hàng</span>" ? 'selected' : '' }}
                                        value="<span class='badge badge-primary font-status'>Đang giao hàng</span>">Đang
                                        giao hàng</option>
                                    <option
                                        {{ $order->status == "<span class='badge badge-success font-status'>Hoàn thành</span>" ? 'selected' : '' }}
                                        value="<span class='badge badge-success font-status'>Hoàn thành</span>">Hoàn thành
                                    </option>
                                    <option
                                        {{ $order->status == "<span class='badge badge-danger font-status'>Hủy đơn</span>" ? 'selected' : '' }}
                                        value="<span class='badge badge-danger font-status'>Hủy đơn</span>">Hủy đơn</option>
                                </select>
                            </div>
                            <div class="col-4 my-1">
                                <button type="submit" class="btn btn-primary">Cập nhật đơn hàng</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-12">
                        <h4>Chi tiết đơn hàng</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $t = 0;
                                @endphp
                                @foreach ($product_orders as $item)
                                    @php
                                        $t++;
                                    @endphp
                                    <tr>
                                        <th scope="row">{{ $t }}</th>
                                        <td>
                                            <img class="img"
                                                src="{{ asset($item->product->feature_image_path) }}" alt="">
                                        </td>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ number_format($item->product->price) }}₫</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ number_format($item->total) }}₫</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th scope="row"></th>
                                    <td colspan="3" class="text-center">Tổng đơn hàng</td>
                                    <td>{{ $order->total_qty }}</td>
                                    <td>{{ number_format($order->total) }}₫</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


<style>
    .img {
        width: 50px;
        object-fit: cover;
    }

    .font-status {
        font-size: 100% !important;
    }

</style>
