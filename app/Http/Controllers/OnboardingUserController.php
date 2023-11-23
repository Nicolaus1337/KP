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
        
        $user = Auth::user()->roles;
        $decodedRoles = json_decode($user);
        $roleName = $decodedRoles[0]->name;

        $onboarding = Onboarding::create([
            'judul' => 'Onboarding Activity',
            'status' => 'draft',
            'start' => now(),
            'end' => now()->addDays(30), 
            'created_by' =>  $roleName,
            'onboarding_image' => '',
            'description' => ''

            
        ]);

        $onboarding->update([
            'start' => Carbon::parse($onboarding->start)->format('Y-m-d H:i:s'),
            'end' => Carbon::parse($onboarding->end)->format('Y-m-d H:i:s'),
        ]);
        
        return response()->json(['onboarding_id' => $onboarding->id]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(onboarding $onboarding)
    {
        $this->authorize('read onboarding user');
        
        $contentdone = $onboarding->contents2()
        ->where('participant_id', Auth::id())
        ->wherePivot('status', 'done')
        ->pluck('content_id')
        ->toArray();

        return dd( $onboarding);
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
    public function update(Request $request , onboarding $onboarding)
    {

        if($onboarding->status == 'published'){
            $selectedContentIds = $request->input('content_id', []);

            $user = auth()->user();
    
            if ($onboarding->participants->contains($user)) {
                foreach ($selectedContentIds as $contentId) {
                    $content = Content::find($contentId);
                    
                    $onboarding->contents2()
                        ->wherePivot('participant_id', $user->id)
                        ->wherePivot('content_id', $content->id)
                        ->update(['status' => 'done']);
            
                    $totalContentCount = $onboarding->contents2()
                        ->wherePivot('participant_id', $user->id)
                        ->count();
            
                    $doneContentCount = $onboarding->contents2()
                        ->wherePivot('participant_id', $user->id)
                        ->wherePivot('status', 'done')
                        ->count();
            
                    $participantStatus = ($doneContentCount == $totalContentCount) ? 'done' : (($doneContentCount > 0) ? 'in process' : 'not started');
                    $onboarding->participants()->updateExistingPivot($user, ['status' => $participantStatus]);
                }
            }
            return redirect()->back();
        }
        else {
            if ($request->hasFile('onboarding_image')) {
                $imagePath = 'storage/'.$request->onboarding_image;
                # check whether the image exists in the directory
                if (File::exists($imagePath)) {
                    # delete image
                    File::delete($imagePath);
                }
                $profile_image = $request->onboarding_image->store('onboarding_image', 'public');
                $onboarding->onboarding_image = $profile_image;
            }
    
            
    
            
            
            $onboarding->judul = $request->judul;
            $onboarding->description = $request->description;
            $onboarding->status = "published";
            $onboarding->start = $request->start;
            $onboarding->end = $request->end;
           
            $onboarding->save();
            
            //handle onboarding participant
            $selectedParticipantIds = $request->input('user_id', []);
            $participantsData = [];
               
                $obParticipants = $onboarding->participants->pluck('id')->toArray();
        
                
                $participantsToRemove = array_diff($obParticipants, $selectedParticipantIds);
        
               
                foreach ($participantsToRemove as $participantId) {
                    $user = User::find($participantId);
                    $onboarding->participants()->detach($user);
    
                }
        
                
                foreach ($selectedParticipantIds as $participantId) {
                    $user = User::find($participantId);
                   
                    $participantsData[$user->id] = ['status' => 'not started'];
                    
                }
                $userloginnow = auth()->user()->id;
                $onboarding->participants()->sync($participantsData);
                $onboarding->participants()->attach($userloginnow);
    
            //handle onboarding content
            $selectedContentIds = $request->input('content_id', []);
            $contentsData = [];
    
               
                $obContents = $onboarding->contents->pluck('id')->toArray();
        
                
                $contentsToRemove = array_diff($obContents, $selectedContentIds);
        
               
                foreach ($contentsToRemove as $contentId) {
                    $content = Content::find($contentId);
                    $onboarding->contents()->detach($content);
                }
        
                
                foreach ($selectedContentIds as $contentId) {
                    $content = Content::find($contentId);
                    $contentsData[] = $content->id;
                    
                }
    
                $onboarding->contents()->sync($contentsData);
    
                
                foreach ($selectedContentIds as $contentId) {
                    $content = Content::find($contentId);
                    foreach ($selectedParticipantIds as $participantId) {
                       
                        $user = User::find($participantId);
                        $onboarding->contents2()->attach($content, ['participant_id' => $user->id, 'status' =>'not done']);
                       
                    }
                    $onboarding->contents2()->attach($content, ['participant_id' => auth()->user()->id, 'status' => 'not done']);
                }
                
                
               
            
                return redirect()->back();
        }
        
            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(onboarding $onboarding)
    {
        //
    }
}
