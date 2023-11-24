<?php

namespace App\Http\Controllers;

use App\DataTables\onboardingDataTable;
use App\DataTables\onboardingUserDataTable;
use App\Models\onboarding;
use App\Http\Requests\StoreonboardingRequest;
use App\Http\Requests\UpdateonboardingRequest;
use App\Models\Content;
use App\Models\onboarding_content;
use App\Models\onboarding_participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class OnboardingUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(onboardingUserDataTable  $dataTable)
    {
        $this->authorize('read onboarding user');
        return $dataTable->render('admin.OnboardingUser');
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
        
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show(onboarding $onboarding)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(onboarding $onboarding)
    {
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , onboarding $onboarding)
    {

       
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(onboarding $onboarding)
    {
        //
    }
}
