<div class="modal-content">
    <form id="formAction" action="{{ $assignrole->id ?  route('assignrole.update', $assignrole->id) : route('assignrole.store')}}" method="post">
    @csrf
    @if ($assignrole->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Assign User Role</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row ms-1">
            
            @foreach ($roles as $role)
                <div  class="form-check">
                <input class="form-check-input" type="checkbox" name="roles[]" value="{{ $role->id }}" {{ in_array($role->id, $userRoles) ? 'checked' : '' }}>
                <label class="form-check-label" for="flexCheckDefault">
                {{ $role->name }}
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