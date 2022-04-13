<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;


class adminController extends Controller
{
    function index()
    {
        $orders = order::simplePaginate(8);
        $total_sales = 0;

        $order_complete = order::where('status', 'LIKE', '%Hoàn thành%')->get()->count();
        $order_handle = order::where('status', 'LIKE', '%Đang xử lý%')->get()->count();
        $order_cancel = order::where('status', 'LIKE', '%Hủy đơn%')->get()->count();
        $order_delivery = order::where('status', 'LIKE', '%Đang giao hàng%')->get()->count();

        $count['order_complete'] = $order_complete;
        $count['order_handle'] = $order_handle;
        $count['order_cancel'] = $order_cancel;
        $count['order_delivery'] = $order_delivery;

        foreach ($orders as $item) {
            $total_sales += $item->total;
        }
        return view('admin.dashboard', compact('orders', 'count', 'total_sales'));
    }
}
