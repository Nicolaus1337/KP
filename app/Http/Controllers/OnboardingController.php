<?php

namespace App\Http\Controllers;

use App\DataTables\onboardingDataTable;
use App\Models\onboarding;
use App\Http\Requests\StoreonboardingRequest;
use App\Http\Requests\UpdateonboardingRequest;
use Illuminate\Support\Facades\Request;

class OnboardingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(onboardingDataTable  $dataTable)
    {
        $this->authorize('read onboarding');
        return $dataTable->render('admin.Onboarding');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::User()->name;
        $onboarding = Onboarding::create([
            'judul' => 'Onboarding Activity',
            'status' => 'draft',

            
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(onboarding $onboarding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(onboarding $onboarding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateonboardingRequest $request, onboarding $onboarding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(onboarding $onboarding)
    {
        //
    }
}
