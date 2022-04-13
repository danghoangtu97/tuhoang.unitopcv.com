<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeUserRequest;
use App\Http\Requests\uploadAllRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Hash;

class adminUserController extends Controller
{
   
    function index()
    {
        $users = User::simplePaginate(5);
        return view('admin.user.index', compact('users'));
    }

    function create()
    {
        $roles = role::get();
        return view('admin.user.create', compact('roles'));
    }

    function store(storeUserRequest $request)
    {
        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            $user->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    function edit($id)
    {
        $user = User::find($id);
        $roles = role::all();
        $roleOfUser = $user->roles;
        return view('admin.user.edit', compact('user', 'roles', 'roleOfUser')); 
    }

    function update($id, Request $request)
    {
        try {
            DB::beginTransaction();
            User::find($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $user = User::find($id);
            $user->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("message:" . $exception->getMessage() . 'Line: ' . $exception->getLine());
        }
    }

    function delete($id)
    {
        try {
            User::find($id)->delete();
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
