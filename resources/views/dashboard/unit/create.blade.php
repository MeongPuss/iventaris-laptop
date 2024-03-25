<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Tambah Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form action="{{ route('unit.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="unit_induk">Unit Induk<span class="text-danger">*</span></label>
                            <select class="form-control" id="unit_induk" name="unit_induk">
                                <option value="null">Tidak ada</option>
                                @foreach ($unit as $units)
                                    @if ($units->unit_id == null)
                                        <option value="{{ $units->id }}">{{ $units->nama_unit }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="unit_pelaksana">Unit Pelaksana<span class="text-danger">*</span></label>
                            <select class="form-control" id="unit_pelaksana" name="unit_pelaksana">
                                <option value="null">Tidak ada</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama_unit" class="control-label">Nama Unit<span
                                    class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="nama_unit" id="nama_unit"
                                placeholder="Input Nama Unit" autofocus>
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
