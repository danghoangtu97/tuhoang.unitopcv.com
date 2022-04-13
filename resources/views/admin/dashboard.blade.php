@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        @include('partials.admin.header-content', ['name' => 'Home', 'key' => 'Home'])
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                            <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $count['order_complete'] }}</h5>
                                <p class="card-text">Đơn hàng giao dịch thành công</p>
                            </div> 
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                            <div class="card-header">ĐANG XỬ LÝ</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $count['order_handle'] }}</h5>
                                <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                            <div class="card-header">DOANH SỐ</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ number_format($total_sales) }}đ</h5>
                                <p class="card-text">Doanh số hệ thống</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                            <div class="card-header">ĐƠN HÀNG HỦY</div>
                            <div class="card-body">
                                <h5 class="card-title">{{ $count['order_cancel'] }}</h5>
                                <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header font-weight-bold">
                        ĐƠN HÀNG MỚI
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Mã</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Giá trị</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Tác vụ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $item)
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>{{ $item->code }}</td>
                                        <td>
                                            {{ $item->customer->name }} <br>
                                            {{ $item->customer->phone_number }}
                                        </td>
                                        <td>{{ $item->total_qty }}</td>
                                        <td>{{ number_format($item->total) }}₫</td> 
                                        <td>{!! $item->status !!}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>
                                            <a href="{{ route('order.detail', $item->id) }}"
                                                class="btn btn-success btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="" data-url="{{ route('order.delete', $item->id) }}" class="action_delete btn btn-danger btn-sm rounded-0 text-white" type="button"
                                                data-toggle="tooltip" data-placement="top" title="Delete"><i
                                                    class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('/admins/product/index/list.js') }}"></script>
  
@endsection
<style>
    .font-status {
        font-size: 100% !important;
    }

</style>
