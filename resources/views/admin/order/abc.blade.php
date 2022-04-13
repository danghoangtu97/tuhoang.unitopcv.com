<div class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Thông tin khách hàng
        </div>
        <div class="card-body">
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
            <form action="" method="POST">
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
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chi tiết đơn hàng
        </div>
        <div class="card-body">
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
                    @foreach ($product_orders as $item)
                        <tr>
                            <th scope="row">1</th>
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
                </tbody>
            </table>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
            Chi tiết đơn hàng
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-light text-center">
                    <tr>
                        <th colspan="2">Giá trị đơn hàng</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>Tổng số sản phẩm</th>
                        <th>{{ $order->total_qty }}</th>
                    </tr>
                    <tr>
                        <th>Tổng giá trị đơn hàng</th>
                        <td>{{ number_format($order->total) }}₫</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>