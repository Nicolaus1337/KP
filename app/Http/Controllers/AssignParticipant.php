<?php

namespace App\Http\Controllers;

use App\Models\onboarding;
use App\Models\User;
use Illuminate\Http\Request;

class AssignParticipant extends Controller
{
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
    public function edit(onboarding $onboarding)
    {
        $users = User::all();
        $obparticipant = $onboarding->participants->pluck('id')->toArray();
        return view('admin.Onboarding-ParticipantSetting', compact('onboarding','users','obparticipant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, onboarding $assignparticipant)
    {
        //handle onboarding participant
        $selectedParticipantIds = $request->input('user_id', []);
        $participantsData = [];
        
            $obParticipants = $assignparticipant->participants->pluck('id')->toArray();

            
            $participantsToRemove = array_diff($obParticipants, $selectedParticipantIds);

        
            foreach ($participantsToRemove as $participantId) {
                $user = User::find($participantId);
                $assignparticipant->participants()->detach($user);

            }

            
            foreach ($selectedParticipantIds as $participantId) {
                $user = User::find($participantId);
            
                $participantsData[$user->id] = ['status' => 'not started'];
                
            }
        
            $assignparticipant->participants()->sync($participantsData);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        
       
    }
}
