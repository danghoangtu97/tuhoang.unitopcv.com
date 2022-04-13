<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// use App\Traits\storageImageTrait;
use App\components\categoryRecursive;
use App\Http\Requests\storeProductRequest;
use App\Models\product;
use App\Models\category;
use App\Models\product_image;
use App\components\storageImages;


class adminProductController extends Controller
{
    // use storageImageTrait;
    private $categoryRecursive;
    private $storageImages;
    private $product;
    private $category;
    function __construct(categoryRecursive $categoryRecursive, product $product, category $category, storageImages $storageImages)
    {
        $this->categoryRecursive = $categoryRecursive;
        $this->product = $product;
        $this->storageImages = $storageImages;
        $this->category = $category;
       
    }
    function index()
    {
        $products = $this->product->simplePaginate(5);
        return view('admin.product.index', compact('products'));
    }

    function create()
    {
        $htmlOption = $this->categoryRecursive->categoryRecursiveAdd();
        return view('admin.product.create', compact('htmlOption'));
    }

    function store(storeProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $child_category = $this->category->where('id', $request->category_id)->first();
            if ($child_category->parent_id != 0) {
                $parent_category = $this->category->where('id', $child_category->parent_id)->first();
            } else {
                $parent_category = $child_category;
            }

            $dataProductCreate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
                'parent_category' => $parent_category->id
            ];

            $dataFeatureImageUpload = $this->storageImages->StorageImageUpdate($request, 'feature_image_path', 'product');

            if (!empty($dataFeatureImageUpload)) {
                $dataProductCreate['feature_image_path'] = $dataFeatureImageUpload['file_path'];
                $dataProductCreate['feature_image_name'] = $dataFeatureImageUpload['file_name'];
            }

            $product = $this->product->create($dataProductCreate);

            // //Insert  data to product_images
            if ($request->hasFile('img_path')) {
                foreach ($request->img_path as $fileItem) {
                    $dataProductImageDetail = $this->storageImages->StorageImageUpdateMultiple($fileItem, 'product');

                    $product->images()->create([
                        'img_path' => $dataProductImageDetail['file_path'],
                        'img_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('product.index')->with('status', 'Thêm sản phẩm mới thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    function edit($id)
    {
        $product = $this->product->find($id);
        $htmlOption = $this->categoryRecursive->categoryRecursiveEdit($product->category_id);
        return view('admin.product.edit', compact('product', 'htmlOption'));
    }

    function update($id, Request $request)
    {

        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id' => $request->category_id,
                'user_id' => auth()->id(),
            ];

            $dataFeatureImageUpload = $this->storageImages->StorageImageUpdate($request, 'feature_image_path', 'product');

            if (!empty($dataFeatureImageUpload)) {
                $dataProductUpdate['feature_image_path'] = $dataFeatureImageUpload['file_path'];
                $dataProductUpdate['feature_image_name'] = $dataFeatureImageUpload['file_name'];
            }

            $this->product->find($id)->update($dataProductUpdate);

            $product = $this->product->find($id);

            // //Insert  data to product_images
            if ($request->hasFile('img_path')) {
                product_image::where('product_id', $id)->delete();
                foreach ($request->img_path as $fileItem) {
                    $dataProductImageDetail = $this->storageImages->StorageImageUpdateMultiple($fileItem, 'product');
                    $product->images()->create([
                        'img_path' => $dataProductImageDetail['file_path'],
                        'img_name' => $dataProductImageDetail['file_name'],
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('product.index')->with('status', 'Cập nhật sản phẩm thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    function delete($id) 
    {
        try {
           $this->product->find($id)->delete();
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
