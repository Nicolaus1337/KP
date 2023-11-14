<?php

namespace App\Http\Controllers;

use App\DataTables\UnitKerjaDataTable;
use App\Http\Requests\UnitKerjaRequest;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitKerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UnitKerjaDataTable $dataTable)
    {
        $this->authorize('read data unit kerja');
        return $dataTable->render('admin.UnitKerja');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unitKerja-action', ['unit_kerja' =>new UnitKerja()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UnitKerjaRequest $request)
    {
        UnitKerja::create($request->all());

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
    public function edit(UnitKerja $unit_kerja)
    {
        return view('admin.unitKerja-action', compact('unit_kerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UnitKerjaRequest $request, UnitKerja $unit_kerja)
    {
       

        // Get the old and new values of 'nama_unit_kerja'
        $oldNamaUnitKerja = $unit_kerja->nama_unit_kerja;
        
     
        


        $unit_kerja->kode_unit_kerja = $request->kode_unit_kerja;
        $unit_kerja->nama_unit_kerja = $request->nama_unit_kerja;
        $unit_kerja->save();

        // Update the related 'unit_kerja' in the 'User' model
        User::where('unit_kerja', $oldNamaUnitKerja)
            ->update(['unit_kerja' =>$unit_kerja->nama_unit_kerja]);

        return response()->json([
            'status' => 'success',
            'message' => 'data updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitKerja $unit_kerja)
    {
        $unit_kerja->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'data deleted succesfully !'
        ]);
    }
}