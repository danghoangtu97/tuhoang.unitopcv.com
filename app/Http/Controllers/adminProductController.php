<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// use App\Traits\storageImageTrait;
use App\components\categoryRecursive;
use App\components\changeSlug;
use App\components\listProduct;
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
    private $changeSlug;
    private $listProduct;
    function __construct(categoryRecursive $categoryRecursive, product $product, category $category, storageImages $storageImages, changeSlug $changeSlug, listProduct $listProduct)
    {
        $this->categoryRecursive = $categoryRecursive;
        $this->product = $product;
        $this->storageImages = $storageImages;
        $this->category = $category;
        $this->changeSlug = $changeSlug;
        $this->listProduct = $listProduct;
    }
    function index(Request $request)
    {
        $keyword = '';
        if ($request['keyword']) {
            $keyword = $request['keyword'];
            $products = product::where('name', 'LIKE', "%{$keyword}%")->simplePaginate(5);
        } else {
            $products = $this->product->simplePaginate(5);
        }

        $slug = '';
        if($request['slug']){
            $slug = $request['slug'];
            $products = $this->listProduct->listProductSearch($slug);
        } else {
            $products = $this->product->simplePaginate(5);
        }

        $htmlOption = $this->categoryRecursive->categorySearch();

        return view('admin.product.index', compact('products', 'htmlOption'));
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
            $slug = $this->changeSlug->seoUrl($child_category->name);
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
                'parent_category' => $parent_category->id,
                'slug' => $slug,
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
            return redirect()->route('product.index')->with('status', 'Th??m s???n ph???m m???i th??nh c??ng');
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
            $category_name = category::find($request->category_id);
            $slug = $this->changeSlug->seoUrl($category_name->slug);

            $dataProductUpdate = [
                'name' => $request->name,
                'price' => $request->price,
                'content' => $request->contents,
                'category_id' => $request->category_id,
                'slug' => $slug,
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
            return redirect()->route('product.index')->with('status', 'C???p nh???t s???n ph???m th??nh c??ng');
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
