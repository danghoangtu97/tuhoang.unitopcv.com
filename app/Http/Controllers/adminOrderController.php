<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\product_order;
use Illuminate\Support\Facades\Log;

class adminOrderController extends Controller
{
    function index()
    {
        $orders = order::simplePaginate(8);
        return view('admin.order.index', compact('orders'));
    }

    function detail($id)
    {
        $order = order::find($id);
        $product_orders = product_order::where('order_id', $id)->get();

        return view('admin.order.detail', compact('order', 'product_orders'));
    }

    function update($id, Request $request)
    {
        order::find($id)->update([
            'status' => $request['status'],
        ]);

        return redirect()->route('dashboard');
    }

    // function delete($id)
    // {
    //     order::find($id)->delete();
    //     $order = order::find($id);
    //     $order->product_orders()->detach();
    //     return redirect()->route('order.index');
    // }

    function delete($id) 
    {
        try {
           order::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (\Exception $exception) {
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
        
    }
}
