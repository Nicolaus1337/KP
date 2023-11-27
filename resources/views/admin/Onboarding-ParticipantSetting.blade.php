<div class="modal-content">
    <form id="formAction" action="{{ route('onboarding.updateparticipant', ['onboarding' => $onboarding->id]) }}" method="post">
    @csrf
    @if ($onboarding->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Add Participants</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
        

        <div class="col-md-6">
                <div class="mb-6">
                    <label for="basicInput" class="form-label">Select Participant</label>
                    
                    <select class="form-control" multiple="multiple" name="user_id[]" id="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ in_array($user->id, $obparticipant) ? 'selected' : '' }}>
                                {{ $user->name }}
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