<div class="modal-content">
    <form id="formAction" action="{{ $unit_kerja->id ?  route('unit_kerja.update', $unit_kerja->id) : route('unit_kerja.store')}}" method="post">
    @csrf
    @if ($unit_kerja->id)
    @method('put')
    @endif
    <div class="modal-header">
        <h5 class="modal-title" id="largeModalLabel">UNIT KERJA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"
            aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">Kode Unit Kerja</label>
                    <input type="text" placeholder="Kode Unit Kerja" value="{{ $unit_kerja->kode_unit_kerja }}" name="kode_unit_kerja" class="form-control" id="kode_unit_kerja">
                </div>
            </div>

            <div class="col-md-4">
                <div class="mb-3">
                    <label for="basicInput" class="form-label">Nama Unit Kerja</label>
                    <input type="text" placeholder="Nama Unit Kerja" value="{{ $unit_kerja->nama_unit_kerja }}" name="nama_unit_kerja" class="form-control" id="nama_unit_kerja">
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