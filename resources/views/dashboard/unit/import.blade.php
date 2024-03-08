<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Import Unit</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form action="{{ route('unit.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" data-plugins="dropify" name="file" />
                        </div>                     
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light" data-dismiss="modal">
                    <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Tutup
                </button>
                <button class="btn btn-success btn-rounded waves-effect waves-light" name="save" value="save">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Simpan
                </button>
            </div>
        </form>
    </div>
</div>