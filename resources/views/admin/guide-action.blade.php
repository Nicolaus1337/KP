<div class="modal-content">
    <form id="formAction" action="{{ route('guide.store') }}" method="post">
        @csrf
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ADD GUIDE FROM CONTENT</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="column">
                <div class="col-md-6">
                    <label class="form-label">Content</label>
                    <select class="form-select mb-3" aria-label="Default select example" name="content_id" id="content_id">
                        <option value="">Select a content</option> 
                        @foreach($contents as $content)
                            <option value="{{ $content->id }}">{{ $content->title }}</option>
                        @endforeach
                    </select>
                </div>
                
                       
                        <input type="hidden" name="content_name" id="content_name" readonly>

            <div class="col-md-6">
                <div class="mb-6">
                    <label for="basicInput" class="form-label">Nama Tag</label>
                    
                    <select class="form-control" multiple="multiple" name="tag[]" id="tag">
                    
                    @foreach ($tags as $tag)
                    <option >{{$tag -> name}}</option>
                    @endforeach

                    </select>
                </div>
            </div>

            
                    
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</div>

<script>
    const contentSelect = document.getElementById('content_id');
    const contentNameInput = document.getElementById('content_name');

    contentSelect.addEventListener('change', function () {
        
        const selectedOption = contentSelect.options[contentSelect.selectedIndex];
       
        const contentName = selectedOption.text;
        
        contentNameInput.value = contentName;
    });
</script>
