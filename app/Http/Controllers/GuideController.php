<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuideRequest;
use App\Models\Content;
use App\Models\ContentImage;
use App\Models\Guide;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('read guide');

        $visibility = Auth::user()->unit_kerja;


       
        $contentt = Guide::all();
        $contentImages = [];

        
        $contents = $contentt->filter(function ($guide) use ($visibility) {
            $content = $guide->content;

            return $content->visibility === null || $content->visibility === $visibility;
        });

        foreach ($contents as $content) {
        $firstContentImage = ContentImage::where('content_id', $content->content_id)->first();
        $contentImages[] = $firstContentImage;
        }
    
        return view('admin.Guide', compact('contents','contentImages'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $contents = Content::all();
        
        return view('admin.guide-action', ['guide' =>new Guide()], compact('contents','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuideRequest $request)
    {
        $tags = (array) $request->tag; 
        $contentId = $request->content_id;
    
       
        $existingGuide = Guide::where('content_id', $contentId)->first();
    
        
        $tagIds = [];
    
        
        foreach ($tags as $tagName) {
       
            $existingTag = Tag::where('name', $tagName)->first();
    
            if ($existingTag) {
               
                $tagIds[] = $existingTag->id;
            } else {
            
                $newTag = Tag::create(['name' => $tagName]);
                $tagIds[] = $newTag->id;
            }
        }
    
        // Update or create the guide
        if ($existingGuide) {
            $existingGuide->update($request->all());
            $existingGuide->tag()->sync($tagIds);
            $message = 'Guide updated successfully.';
        } else {
            $guide = Guide::create($request->all());
            $guide->tag()->attach($tagIds); 
            $message = 'Guide created successfully.';
        }
    
        return response()->json([
            'status' => 'success',
            'message' => $message,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
         
        if($content->type == "text"){

            return view('admin.content-view', compact('content'));
        }
        if($content->type == "pdf"){

            return view('admin.content-viewPdf', compact('content'));
        }
        if($content->type == "video"){

            return view('admin.content-viewVideo', compact('content'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Guide $guide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Guide $guide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guide $guide)
    {
        $guide->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'data deleted succesfully !'
        ]);
    }

    public function search(Request $request)
    {
        $output = "";
        $contents = Guide::all();

        $guides = Guide::where('content_name', 'LIKE', '%' . $request->search . '%')
                        ->orWhereHas('tag', function ($query) use ($request) {
                            $query->where('name', 'LIKE', '%' . $request->search . '%');
                        })
                        ->get();

        foreach ($guides as $guide) {
            $contentImages = ContentImage::where('content_id', $guide->id)->first();

            $tagNames = $guide->tag->pluck('name')->toArray(); // Get all tag names for the guide

            $tagColors = [
                'Petunjuk Umum' => 'warning',
                'Departmen IT','Dept IT','Dept It' => 'success', 
                
            ];
            
            $colorClass = isset($tagNames[0]) ? ($tagColors[$tagNames[0]] ?? 'primary') : 'primary';

            $output .= '
                <div class="col-md-4">
                    <div class="card mb-3" style="height: 330px;">
                        <img src="'.$contentImages->image_path.'" style="object-fit: contain; width: 100%; height: 200px;">
                        <div class="card-body">
                            <div class="column">';

            // Display all tags for the guide
            foreach ($tagNames as $tagName) {
                $colorClass = $tagColors[$tagName] ?? 'primary';
                $output .= '<span class="badge bg-' . $colorClass . '">' . $tagName . '</span> ';
            }


            $output .= '</div>
                <h4 class="card-title">' . $guide->content_name . '</h4>
                <div class="column">';


            if (Gate::allows('delete guide')) {
                $output .= '<button type="button" data-id='.$guide->content_id.' data-jenis="view" class="btn btn-primary btn-sm action">Read More</button>';
                $output .= '<button type="button" data-id='.$guide->content_id.' data-jenis="delete" class="btn btn-danger btn-sm action">REMOVE</button>';
            } else {
                $output .= '<button type="button" data-id='.$guide->content_id.' data-jenis="view" class="btn btn-primary btn-sm action">Read More</button>';
            }
        
            $output .= '</div>
                        </div>
                    </div>
                </div>
            </div>';
        
            
        }

        return response($output);
    }
}
