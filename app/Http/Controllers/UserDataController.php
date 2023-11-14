<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Http\Requests\UserRequest;
use App\Models\AssignRole;
use App\Models\Role;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDataController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index(UserDataTable $dataTable)
    {
        $this->authorize('read data user');
        return $dataTable->render('admin.DataUser');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unitkerjas = UnitKerja::all();
        return view('admin.dataUser-action', ['data_user' =>new User()], compact('unitkerjas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        User::create($request->all());

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
    public function edit(User $data_user)
    {
        $unitkerjas = UnitKerja::all();
        return view('admin.dataUser-action', compact('data_user'), compact('unitkerjas'));
    }

   

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $data_user)
    {
        $data_user->npk = $request->npk;
        $data_user->name = $request->name;
        $data_user->unit_kerja = $request->unit_kerja;
        $data_user->email = $request->email;
        $data_user->password = Hash::make($request->password);
        $data_user->save();

        return response()->json([
            'status' => 'success',
            'message' => 'data updated'
        ]);
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $data_user)
    {
        $data_user->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'data deleted succesfully !'
        ]);
    }
}

