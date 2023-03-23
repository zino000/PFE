<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index()
    {
        return Admin::select('id','login','password')->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        admin::create($request->post());
        return response()->json([
            'admin' => 'Admin created successfully'
        ]);
    }

    public function show(Admin $admin)
    {
        return response()->json([
            'admin' => $admin
        ]);
    }

    public function update(Request $request, Admin $admin)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);
        $admin->fill($request->post())->update();
        return response()->json([
            'message' => 'Admin updated successfully'
        ]);
    }

    public function destroy(Admin $admin)
    {
        $admin->delete();
        return response()->json([
            'message' => 'Admin deleted successfully'
        ]);
    }
}
