<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Import History Laptop</h4>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form action="{{ route('history-laptop.import') }}" method="POST" enctype="multipart/form-data">
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
                <button class="btn btn-success btn-rounded waves-effect waves-light" name="save" value="penyerahan">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Penyerahan
                </button>
                <button class="btn btn-primary btn-rounded waves-effect waves-light" name="save" value="rotasi">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Rotasi
                </button>
                <button class="btn btn-warning btn-rounded waves-effect waves-light" name="save" value="pengembalian">
                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Pengembalian
                </button>
            </div>
        </form>
    </div>
</div>
