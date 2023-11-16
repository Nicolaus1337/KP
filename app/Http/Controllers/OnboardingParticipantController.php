<?php

namespace App\Http\Controllers;

use App\Models\onboarding;
use App\Models\onboarding_participant;
use App\Models\User;
use Illuminate\Http\Request;

class OnboardingParticipantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        
        return view('admin.Onboarding-participant', ['ob_participant' =>new onboarding_participant()], compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(onboarding_participant $onboarding_participant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(onboarding $onboarding_participant)
    {
        $users = User::all();
        $onboarding_participant = $onboarding_participant->participants->pluck('id')->toArray();
        return view('admin.Onboarding-participant', compact('assignrole','roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, onboarding_participant $onboarding_participant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(onboarding_participant $onboarding_participant)
    {
        //
    }
}
