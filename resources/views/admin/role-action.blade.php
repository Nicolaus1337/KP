<div class="modal-content">
    <form id="formAction" action="{{ $role->id ?  route('roles.update', $role->id) : route('roles.store')}}" method="post">
    @csrf
    @if ($role->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">ROLE</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">Nama Role</label>
                    <input type="text" placeholder="Role Name" value="{{ $role->name }}" name="name" class="form-control" id="roleName">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                   
                    <input type="text" placeholder="Guard Name" value="{{ $role->guard_name }}" name="guard_name" class="form-control" id="guardName" hidden>
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