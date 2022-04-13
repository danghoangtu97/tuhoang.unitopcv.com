<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\post;

class clientPostController extends Controller
{
    function listPost($category) 
    {
        $posts = post::where('category', $category)->simplePaginate(7);
        $productBestSeller = product::latest('best_seller', 'desc')->take(6)->get();
        return view('client.post.listPost', compact('productBestSeller', 'posts'));
    }

    function detailPost($slug)
    {
       $post = post::where('slug', $slug)->first();
       $productBestSeller = product::latest('best_seller', 'desc')->take(6)->get();

       return view('client.post.detailPost', compact('productBestSeller', 'post'));
    }
}
