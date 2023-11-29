<div class="modal-content">
    <form id="formAction" action="{{ $content->id ?  route('content.update', $content->id) : route('content.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    @if ($content->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="extralargeModalLabel">CONTENT</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="container p-4 ">
            <div class="row justify-content-md-center">
                <div class="col-md-12">
                
                
                
                    <label for="">Title:</label>
                    <input type="text" class="form-control" name="title" value="{{$content->title}}">

                    <label for="visibility" class="form-label">Visibility</label>
                        <select class="form-control" name="visibility" id="visibility">
                            <option value ="">Public</option>
                            <option value="{{auth()->user()->unit_kerja}}">Private</option>
                        </select>

                    <div class="col-md-6">
                    <label class="form-label">Type:</label>
                        <select class="form-select mb-3" aria-label="Default select example" name="type" id="type">
                            @if($content->type == "text")
                            <option value="text" >Text</option>
                            @elseif($content->type == "pdf")
                            <option value="pdf" >Pdf</option>
                            @elseif($content->type == "video")
                            <option value="video" >Video</option>

                            @else
                            <option value="text" >Text</option>
                            <option value="pdf" >Pdf</option>
                            <option value="video" >Video</option>
                            @endif
                            
                        </select>
                    </div>

                    <div id="text" class="file-input" style="display: none;">
                        <label for="">Description:</label>
                        <textarea name="description" id="description" cols="30" rows="10">{{$content->description}}</textarea>
                    </div>

                    <div id="pdf" class="file-input" style="display: none;">
                    <div class="mb-3 ">
                        <label for="formFile" class="form-label">Add PDF</label>
                        <input class="form-control" type="file" name="pdf" id="pdf" accept=".pdf" value="{{$content->description}}">
                    </div>
                    </div>

                    <div id="video" class="file-input" style="display: none;">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Add Video</label>
                        <input class="form-control" type="file" name="video" id="video" accept=".mp4" value="{{$content->description}}">
                    </div>
                    </div>
                   
                    

                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>



