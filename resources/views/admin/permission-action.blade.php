<div class="modal-content">
    <form id="formAction" action="{{ $permission->id ?  route('permission.update', $permission->id) : route('permission.store')}}" method="post">
    @csrf
    @if ($permission->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">Basic Input</label>
                    <input type="text" placeholder="Permission Name" value="{{ $permission->name }}" name="name" class="form-control" id="permissionName">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">Basic Input</label>
                    <input type="text" placeholder="Guard Name" value="{{ $permission->guard_name }}" name="guard_name" class="form-control" id="guardName">
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