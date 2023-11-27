<?php

namespace App\Http\Controllers;

use App\DataTables\onboardingDataTable;
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

        

        return view('admin.Onboarding-kerjakan', compact('onboarding', 'contentdone'));
    }

    public function showcontent(onboarding $onboarding, Content $contents)
    {
   
        if($onboarding->status == 'published'){
            $contentdone = $onboarding->contents2()
            ->where('participant_id', Auth::id())
            ->wherePivot('status', 'done')
            ->pluck('content_id')
            ->toArray();

            $content = $onboarding->contents2->find($contents->id);

            $user = auth()->user();
    
            if ($onboarding->participants->contains($user)) {
                
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
            return view('admin.Onboarding-ContentView', compact('onboarding', 'content','contentdone'));
        }
        
      
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(onboarding $onboarding)
    {
        $this->authorize('update onboarding');
        $users = User::all();
        $contents = Content::all();
        
        return view('admin.Onboarding-setting', compact('onboarding','users','contents'));
    }

    public function addparticipant(onboarding $onboarding)
    {
        $users = User::all();
        $obparticipant = $onboarding->participants->pluck('id')->toArray();
        
        return view('admin.Onboarding-ParticipantSetting', compact('onboarding','users','obparticipant'));
    }

    public function addcontent(onboarding $onboarding)
    {
        $contents = Content::all();
        $obcontent = $onboarding->contents->pluck('id')->toArray();
        
        return view('admin.Onboarding-ContentSetting', compact('onboarding','contents','obcontent'));
    }

    public function updateparticipant(Request $request,onboarding $onboarding)
    {
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
         
             $onboarding->participants()->sync($participantsData);


         return response()->json([
            'status' => 'success',
            'message' => 'data updated'
        ]);
    }

    public function updatecontent(Request $request,onboarding $onboarding)
    {
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
 


         return response()->json([
            'status' => 'success',
            'message' => 'data updated'
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , onboarding $onboarding)
    {

        if($onboarding->status == 'draft'){
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
            
          
            $selectedParticipantIds = $request->input('user_id', []);
            
                
    
            
            $selectedContentIds = $request->input('content_id', []);
           
    
                
                foreach ($selectedContentIds as $contentId) {
                    $content = Content::find($contentId);
                    foreach ($selectedParticipantIds as $participantId) {
                       
                        $user = User::find($participantId);
                        $onboarding->contents2()->attach($content, ['participant_id' => $user->id, 'status' =>'not done']);
                       
                    }
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

    public function deleteparticipant(onboarding $onboarding, User $userid)
    {
        $onboarding->participants()->detach($userid);
    }

    public function deletecontent(onboarding $onboarding, Content $contentid)
    {
        $onboarding->contents()->detach($contentid);
    }
}
