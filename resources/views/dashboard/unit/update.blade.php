<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Ubah Unit <b>"{{ $units->nama_unit }}"</b></h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form action="{{ route('unit.update', ['id' => $units->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama_unit" class="control-label">Nama Unit</label>
                            <input type="text" class="form-control" name="nama_unit" id="nama_unit" placeholder="Input nama unit" value="{{ $units->nama_unit }}">
                        </div>            
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-dismiss="modal">
                    <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Tutup
                </button>
                <button class="btn btn-success btn-rounded waves-effect waves-light">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Simpan
                </button>
            </div>
        </form>
    </div>
</div>
