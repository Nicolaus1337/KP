<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\RoleDataTable;
use App\Http\Requests\RoleRequest;
use App\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoleDataTable $dataTable)
    {
        $this->authorize('read role');
        return $dataTable->render('admin.Role');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role-action', ['role' =>new Role()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->all());

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
    public function edit(Role $role)
    {
        return view('admin.role-action', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->name = $request->name;
        $role->guard_name = $request->guard_name;
        $role->save();

        return response()->json([
            'status' => 'success',
            'message' => 'data updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'data deleted succesfully !'
        ]);
    }
}
