<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Http\Requests\storeSliderRequest;
use App\components\storageImages;

use Illuminate\Http\Request;
use App\Models\slider;

class adminSliderController extends Controller
{

    private $slider;
    private $storageImages;
    function __construct(slider $slider, storageImages $storageImages)
    {
        $this->slider = $slider;
        $this->storageImages = $storageImages;
    }
    function index()
    {
        $sliders = $this->slider->simplePaginate(5);
        return view('admin.slider.index', compact('sliders'));
    }

    function create()
    {
        return view('admin.slider.create');
    }

    function store(storeSliderRequest $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataImage = $this->storageImages->StorageImageUpdate($request, 'image_path', 'slider');

        if (!empty($dataImage)) {
            $dataInsert['image_name'] = $dataImage['file_name'];
            $dataInsert['image_path'] = $dataImage['file_path'];
        }

        slider::create($dataInsert);
        return redirect()->route('slider.index');
    }

    function edit($id)
    {
        $slider = slider::find($id);
        return view('admin.slider.edit', compact('slider'));
    }

    function update($id, Request $request)
    {
        $dataInsert = [
            'name' => $request->name,
            'description' => $request->description
        ];
        $dataImage = $this->storageImages->StorageImageUpdate($request, 'image_path', 'slider');
        if (!empty($dataImage)) {
            $dataInsert['image_name'] = $dataImage['file_name'];
            $dataInsert['image_path'] = $dataImage['file_path'];
        }

        slider::find($id)->update($dataInsert);
        return redirect()->route('slider.index');
    }

    function delete($id)
    {
        try {
            slider::find($id)->delete();
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
