<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\permission;

class adminPermissionController extends Controller
{
    function index()
    {  $permissions = permission::where('parent_id', 0)->simplePaginate(5);
        return view('admin.permission.index', compact('permissions'));
    }

    function create()
    {
        return view('admin.permission.create');
    }

    function store(Request $request)
    {
        $permission_parent =  permission::create([
            'name' => $request->module_parent,
            'display_name' => $request->module_parent,
            'parent_id' => 0,
        ]);

        foreach ($request->module_children as $permission_child) { 
            permission::create([
                'name' => $permission_child,
                'display_name' => $permission_child,
                'key_code' => $permission_parent->name . '_' . $permission_child,
                'parent_id' => $permission_parent->id,
            ]);
        }

        return redirect()->route('permission.index');
    }
}
