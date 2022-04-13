<?php

namespace App\Http\Controllers;

use App\Http\Requests\cartRequest;
use Illuminate\Http\Request;
use App\Models\product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use App\Models\order;
use App\Models\customer;
use App\Models\product_order;


class cartController extends Controller
{
    function index()
    {
        return view('client.cart.show');
    }

    function add($id)
    {
        $product = product::find($id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'qty' => 1,
            'weight' => 0,
            'options' => ['thumbnail' => $product->feature_image_path],
        ]);


        return redirect()->route('cart.show');
    }

    function addToCart($id)
    {
        try {
            $product = product::find($id);
            Cart::add([
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'qty' => 1,
                'weight' => 0,
                'options' => ['thumbnail' => $product->feature_image_path],
            ]);

            $count = Cart::count();


            $view = view('client.inc.dropdown_cart')->render();
         

            return response()->json([
                'code' => 200,
                'count' =>  $count,
                'view' => $view,
                'msg' => 'Thêm sản phẩm vào giỏ hàng thành công',
            ], 200);
            
        } catch (\Exception $exception) {
            Log::error("message" . $exception->getMessage() . '------ Line :' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }

    function update(Request $request)
    {
        $data = $request->input('qty');

        foreach ($data as $k => $v) {
            Cart::update($k, $v);
        }

        return redirect()->route('cart.show');
    }

    function destroy()
    {
        Cart::destroy();
        return redirect()->route('cart.show');
    }

    function remove($rowId)
    {
        Cart::remove($rowId);

        return redirect()->route('cart.show');
    }

    function checkout()
    {
        return view('client.cart.checkout');
    }

    function payment(cartRequest $request) 
    {
        try {
            DB::beginTransaction();
            $customer = customer::create([
                'name' => $request['fullName'],
                'email' => $request['email'],
                'phone_number' => $request['phone_number'],
                'address' => $request['address'],
            ]);

            $total = Str::remove(',', Cart::total());
            $total_qty = 0;

            foreach (Cart::content() as $item) {
                $total_qty += $item->qty;
            }

            $order = order::create([
                'code' => Str::random(8),
                'status' => "<span class='badge badge-warning font-status'>Đang xử lý</span>",
                'total' =>  $total,
                'note' => $request['note'],
                'payment' => $request['payment-method'],
                'customer_id' => $customer->id,
                'total_qty' => $total_qty,
            ]);

            foreach (Cart::content() as $item) {
                product_order::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'qty' => $item->qty,
                    'total' => $item->total,
                ]);
            }

            DB::commit();

            Cart::destroy();
            return view('client.cart.success');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
}
