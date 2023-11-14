<div class="modal-content">
    <form id="formAction" action="{{ $assignpermission->id ?  route('assignpermission.update', $assignpermission->id) : route('assignpermission.store')}}" method="post">
    @csrf
    @if ($assignpermission->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Assign Role Permission</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">

        <div class="scrollable-checkbox-list">
            @foreach ($permissions as $permission)
                <div>
                <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}>
                    {{ $permission->name }}
                </div>
            @endforeach
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