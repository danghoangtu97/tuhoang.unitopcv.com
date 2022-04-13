<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeRoleRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Models\role;
use App\Models\permission;

class adminRoleController extends Controller
{
    function index()
    {
        $roles = role::simplePaginate(5);
        return view('admin.role.index', compact('roles'));
    }

    function create()
    {
        $permissionParents = permission::where('parent_id', 0)->get(); 
        return view('admin.role.create', compact('permissionParents'));
    }

    function store(storeRoleRequest $request)
    {
        try {
            DB::beginTransaction();
            $role = role::create([
                'name' => $request->name,
                'display_name' => $request->display_name, 
            ]);

            $role->permissions()->attach($request->permission_id);
         
           DB::commit();
           return redirect()->route('role.index')->with('status', 'Đã thêm quyền thành công');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }

       
    }

    function edit($id)
    {
        $permissionParents = permission::where('parent_id', 0)->get(); 
        $role = role::find($id);
        $permissionChecked = $role->permissions;
        return view('admin.role.edit', compact('role', 'permissionParents', 'permissionChecked'));
    }

    function update($id, Request $request)
    {      
        try {
            DB::beginTransaction();
            role::find($id)->update([
                'name' =>$request->name,
                'display_name' =>$request->display_name,
            ]);
    
            $roleUpdate = role::find($id);
    
            $roleUpdate->permissions()->sync($request->permission_id);

            DB::commit();
            return redirect()->route('role.index')->with('status', 'Cập nhật quyền thành công');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }
    
    function delete($id)
    {
        try {
            role::find($id)->delete();
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
