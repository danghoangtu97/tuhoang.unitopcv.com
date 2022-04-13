<?php

namespace App\Http\Controllers;

use App\Http\Requests\storageSettingsRequest;
use App\Http\Requests\uploadAllRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Http\Request;
use App\Models\settings;

class adminSettingsController extends Controller
{
    private $settings;

    function __construct(Settings $settings)
    {
        $this->settings = $settings;
    }

    function index(Request $request)
    {
        $status = $request->input('status');
        $keyword = '';
        $list_action = [
            'delete' => 'xóa tạm thời',
        ];

        if (!empty($request->input('keyword'))) {
            $keyword = $request->input('keyword');
            $settings = settings::where('config_key', 'LIKE', "%{$keyword}%")->simplePaginate(5);
        } else if ($status == 'trash') {
            $settings = settings::onlyTrashed()->simplePaginate(5);
            $list_action = [
                'forceDelete' => 'Xóa hoàn toàn',
                'restore' => 'Khôi phục'
            ];
        } else {
            $settings = $this->settings->simplePaginate(5);
        }

        $count_trash = settings::onlyTrashed()->count();
        $count_active = settings::count();

        $count = [$count_trash, $count_active];


        return view('admin.settings.index', compact('settings', 'list_action', 'count'));
    }

    function create()
    {
        return view('admin.settings.create');
    }

    function store(storageSettingsRequest $request) 
    {
        $this->settings->create([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        return redirect()->route('settings.index')->with('status', 'bạn thêm settings thành công');
    }

    function edit($id)
    {
        $setting = settings::find($id);
        return view('admin.settings.edit', compact('setting'));
    }

    function update($id, Request $request)
    {
        settings::find($id)->update([
            'name' => $request->name,
            'value' => $request->value,
        ]);

        return redirect()->route('settings.index')->with('status', 'bạn cập nhật settings thành công');
    }

    function delete($id)
    {
        try {
            settings::find($id)->delete();
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
