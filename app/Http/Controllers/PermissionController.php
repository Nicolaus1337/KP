<?php

namespace App\Http\Controllers;

use App\DataTables\PermissionDataTable;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PermissionDataTable $dataTable)
    {
        $this->authorize('create permission');
        return $dataTable->render('admin.Permission');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission-action', ['permission' =>new Permission()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PermissionRequest $request)
    {
        Permission::create($request->all());

        return response()->json([
            'status' =>'succes',
            'message' =>'data created succesfully'
        ]);
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
    public function edit(Permission $permission)
    {
        return view('admin.permission-action', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PermissionRequest $request, Permission $permission)
    {
        $permission->name = $request->name;
        $permission->guard_name = $request->guard_name;
        $permission->save();

        return response()->json([
            'status' => 'success',
            'message' => 'data updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'data deleted succesfully !'
        ]);
    }
}