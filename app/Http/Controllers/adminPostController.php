<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use App\components\changeSlug;
use App\Http\Requests\storePostRequest;
use Illuminate\Http\Request;
use App\Models\post;
use App\components\storageImages;

class adminPostController extends Controller
{
    private $storageImages;
    private $changeSlug;
    function __construct(changeSlug $changeSlug, storageImages $storageImages)
    {
        $this->changeSlug = $changeSlug;
        $this->storageImages = $storageImages;
    }
    function index()
    {
        $posts = post::simplePaginate(5);
        return view('admin.post.index', compact('posts'));
    }

    function create()
    {
        return view('admin.post.create');
    }

    function store(storePostRequest $request)
    {   
        $slug = $this->changeSlug->seoUrl($request['name']);
        $dataInsert = [
            'name' => $request['name'],
            'content' => $request['content'],
            'description' => $request['description'], 
            'slug' => $slug,
            'category' => $request['category'],
        ];

        $dataImage = $this->storageImages->StorageImageUpdate($request, 'image_path', 'post');
        if (!empty($dataImage)) {
            $dataInsert['image_name'] = $dataImage['file_name'];
            $dataInsert['image_path'] = $dataImage['file_path'];
        }

        post::create($dataInsert);

        return redirect()->route('post.index')->with('status', 'Thêm bài viết thành công');
    }

    function edit($id)
    {
        $post = post::find($id);
        return view('admin.post.edit', compact('post')); 
    }

    function update($id, Request $request)
    {
        $slug = $this->changeSlug->seoUrl($request['name']); 
        $dataInsert = [
            'name' => $request['name'],
            'content' => $request['content'],
            'description' => $request['description'],
            'slug' => $slug,
            'category' => $request['category'],
        ];

        $dataImage = $this->storageImages->StorageImageUpdate($request, 'image_path', 'post');
        if (!empty($dataImage)) {
            $dataInsert['image_name'] = $dataImage['file_name'];
            $dataInsert['image_path'] = $dataImage['file_path'];
        }

        post::find($id)->update($dataInsert);

        return redirect()->route('post.index')->with('status', 'Cập nhật bài viết thành công');
    }

    function delete($id)
    {
        try {
            post::find($id)->delete();
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
