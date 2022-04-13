<?php

namespace App\Http\Controllers;

use App\components\listProductClient; 

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\slider;
use App\Models\product;
use App\Models\infoProduct;

class homeController extends Controller
{
    private $listProductClient;
    function __construct(listProductClient $listProductClient)
    {
        $this->listProductClient = $listProductClient;
    }
    function index()
    {
        $categories = category::where('parent_id', 0)->get();
        $sliders = slider::all();
        $productBestSeller = product::latest('best_seller', 'desc')->take(6)->get();
        $productHighlights = product::latest('view', 'desc')->take(6)->get();
        $listPhone =  $this->listProductClient->listProduct('dien-thoai'); 
        $listLaptop =  $this->listProductClient->listProduct('laptop');
        
        return view('client.home', compact('categories', 'sliders', 'productBestSeller', 'productHighlights', 'listPhone', 'listLaptop'));
    }

    function listProduct($slug)
    {
        $categories = category::where('parent_id', 0)->get();
        $productBestSeller = product::latest('best_seller', 'desc')->take(6)->get();
        $listProduct = $this->listProductClient->listProduct($slug); 
        return view('client.product.listProduct', compact('listProduct', 'productBestSeller', 'categories'));
       
    }

    function detailProduct($id)
    {
        $categories = category::where('parent_id', 0)->get();
        $product = product::find($id);
        $slug = $product->slug;
        $infoProduct = infoProduct::where('product_id', $id)->first();
        $productBestSeller = product::latest('best_seller', 'desc')->take(6)->get();
        $sameSlugProduct = product::latest('slug', 'LIKE', "%$slug%")->take(5)->get();
        return view('client.product.detailProduct', compact('product', 'productBestSeller', 'categories', 'infoProduct', 'sameSlugProduct'));
    }

    
}
