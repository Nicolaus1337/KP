<?php

namespace App\Http\Controllers;

use App\DataTables\ContentDataTable;
use App\Http\Requests\ContentRequest;
use App\Http\Requests\ContentUpdateRequest;
use App\Models\Content;
use DOMDocument;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContentDataTable  $dataTable)
    {
        $this->authorize('read content');
        return $dataTable->render('admin.Content');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.content-action', ['content' =>new Content()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContentRequest $request)
    {

        
        if($request->type == "text"){
            
            
            $description = $request->description;

            $images = $this->processImages($description);

           
            $content = Content::create([
                'title' => $request->title,
                'type' => $request->type,
                'description' => $description,
                'visibility' => $request->visibility
            ]);
    
            
            foreach ($images as $imagePath) {
                $content->images()->create(['image_path' => $imagePath]);
            }
            
    
            return response()->json([
                'status' => 'success',
                'message' => 'Data created successfully',
            ]);
        }

        if($request->type == "pdf"){
            $pdf = $request->file('pdf');
            $pdf->move('upload', $pdf->getClientOriginalName());
            $pdf_name = $pdf->getClientOriginalName();

            $content = Content::create([
                'title' => $request->title,
                'type' => $request->type,
                'description' =>  $pdf_name,
                'visibility' => $request->visibility
            ]);
        }

        if($request->type == "video"){
            $video = $request->file('video');
            $video->move('upload', $video->getClientOriginalName());
            $video_name = $video->getClientOriginalName();

            $content = Content::create([
                'title' => $request->title,
                'type' => $request->type,
                'description' => $video_name,
                'visibility' => $request->visibility
            ]);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(Content $content)
    {
       
            return view('admin.content-view', compact('content'));
      


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Content $content)
    {
        return view('admin.content-action', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContentUpdateRequest $request, Content $content)
    {

        
        if($request->type == "text"){
            $description = $request->description;

           
            $newImages = $this->processImages($description);

            
            $existingImages = $content->images;

            // Update existing images (if any)
            foreach ($existingImages as $image) {
                
                $imagePath = $image->image_path;
                if (strpos($description, $imagePath) === false) {
                    
                    $this->removeImage($imagePath);
                    $image->delete();
                }
            }

           
            foreach ($newImages as $imagePath) {
                $content->images()->create(['image_path' => $imagePath]);
            }

            // Update the content
            $content->title = $request->title;
            $content->type = $request->type;
            $content->description = $description;
            $content->visibility = $request->visibility;
            
            $content->save();
        }
        if($request->type == "pdf"){
            if($request->file('pdf')){
                $pdf = $request->file('pdf');
                
                $direktori = public_path('upload\\' . $request->description);
               
                if ( file_exists($direktori)){
                    unlink($direktori);
                    $pdf->move('upload', $pdf->getClientOriginalName());
                    $pdf_name = $pdf->getClientOriginalName();
                    $content->title = $request->title;
                    $content->type = $request->type;
                    $content->description = $pdf_name;
                    $content->visibility = $request->visibility;
                    $content->save();
                }
            }
        
            
            $content->title = $request->title;
            $content->type = $request->type;
            $content->visibility = $request->visibility;
            $content->save();
            
        }
        if($request->type == "video"){
            if($request->file('video')){
                $video = $request->file('video');
                
                $direktori = public_path('upload\\' . $request->description);
               
                if ( file_exists($direktori)){
                    unlink($direktori);
                    $video->move('upload', $video->getClientOriginalName());
                    $video_name = $video->getClientOriginalName();
                    $content->title = $request->title;
                    $content->type = $request->type;
                    $content->description = $video_name;
                    $content->visibility = $request->visibility;
                    $content->save();
                }
            }
        
            
            $content->title = $request->title;
            $content->type = $request->type;
            $content->visibility = $request->visibility;
            $content->save();
            
        }
        
    }


    public function removeImage($imagePath)
    {
        if (file_exists(public_path($imagePath))) {
            unlink(public_path($imagePath));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Content $content)
    {
        $content->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'data deleted succesfully !'
        ]);
    }

    private function processImages($description)
    {
        $dom = new DOMDocument();
        $dom->loadHTML($description, 9);

        $images = $dom->getElementsByTagName('img');
        $imagePaths = [];

        foreach ($images as $key => $img) {
            // Check if the image is a new one
            if (strpos($img->getAttribute('src'), 'data:image/') === 0) {
                $data = base64_decode(explode(',', explode(';', $img->getAttribute('src'))[1])[1]);
                $imagePath = '/upload/' . time() . $key . '.png';
                file_put_contents(public_path($imagePath), $data);
                $img->removeAttribute('src');
                $img->setAttribute('src', $imagePath);
                $imagePaths[] = $imagePath;
            }
        }

        $description = $dom->saveHTML();

        return $imagePaths;
    }

    
}
