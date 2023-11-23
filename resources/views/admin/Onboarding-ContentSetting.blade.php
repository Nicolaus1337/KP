<div class="modal-content">
    <form id="formAction" action="{{ route('onboarding.updatecontent', ['onboarding' => $onboarding->id]) }}" method="post">
    @csrf
    @if ($onboarding->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
        @foreach ($contents as $content)
                
        <div  class="form-check">
                <input class="form-check-input" type="checkbox" name="content_id[]" value="{{ $content->id }}" {{ in_array($content->id, $obcontent) ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                {{ $content->title }}
                </label>
                
        </div>
                
         @endforeach

            


        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary"
            data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
    </div>
    </form>
</div>