<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\infoProduct;


class adminInfoProductController extends Controller
{
    function index($id)
    {
        $product =  product::find($id);
        $info_product = infoProduct::where('product_id', $id)->first();
        return view('admin.info_product.index', compact('product', 'info_product'));
    }

    function create($id)
    {
        $product =  product::find($id);
        return view('admin.info_product.create', compact('product'));
    }

    function store(Request $request)
    {
        $product = product::where('name', 'LIKE', "{$request['name']}")->first();

        infoProduct::create([
            'name' => $request['name'],
            'product_id' => $product->id,
            'information' => $request['information'],
        ]);

        return redirect()->route('info.index', $product->id)->with('status', 'Thêm chi tiết sản phẩm thành công');
    }

    function edit($id)
    {
        $product = product::find($id);
        $info_product = infoProduct::where('product_id', $id)->first();
        
        return view('admin.info_product.edit', compact('product', 'info_product'));
    }

    function update($id, Request $request)
    {
        $product = product::where('name', 'LIKE', "{$request['name']}")->first();

        infoProduct::where('product_id', $id)->update([
            'name' => $request['name'],
            'product_id' => $product->id,
            'information' => $request['information'],
        ]);

        return redirect()->route('info.index', $product->id)->with('status', 'Thêm chi tiết sản phẩm thành công');
    }

    function delete($id)
    {
        infoProduct::where('product_id', $id)->delete();

        return redirect()->route('info.index', $id)->with('status', 'Thêm chi tiết sản phẩm thành công');

    } 
}
