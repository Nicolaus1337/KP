<div class="modal-content">
    <form id="formAction" action="{{ route('onboarding.updatecontent', ['onboarding' => $onboarding->id]) }}" method="post">
    @csrf
    @if ($onboarding->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Select Contents</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
        <div class="col-md-6">
                <div class="mb-6">
                    <label for="basicInput" class="form-label">Select Content</label>
                    
                    <select class="form-control" multiple="multiple" name="content_id[]" id="content_id">
                        @foreach ($contents as $content)
                            <option value="{{ $content->id }}" {{ in_array($content->id, $obcontent) ? 'selected' : '' }}>
                                {{ $content->title }}
                            </option>
                        @endforeach
                    </select>
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