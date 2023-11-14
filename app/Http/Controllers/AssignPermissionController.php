<?php

namespace App\Http\Controllers;

use App\DataTables\AssignPermissionDataTable;
use App\Http\Requests\AssignPermissionRequest;
use App\Models\AssignPermission;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AssignPermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        
        
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $assignpermission)
    {
        $permissions = Permission::all();
        $rolePermissions = $assignpermission->permissions->pluck('id')->toArray();
        return view('admin.assignPermission-action', compact('assignpermission','permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $assignpermission)
    {

        $selectedPermissionIds = $request->input('permissions', []);

        
        $rolePermissions = $assignpermission->permissions->pluck('id')->toArray();

       
        $PermissionsToRemove = array_diff($rolePermissions, $selectedPermissionIds);

       
        foreach ($PermissionsToRemove as $permissionId) {
            $permission = Permission::find($permissionId);
            $assignpermission->revokePermissionTo($permission);
        }

      
        foreach ($selectedPermissionIds as $permissionId) {
            $permission = Permission::find($permissionId);
            $assignpermission->givePermissionTo($permission);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'data updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        
       
    }
}


