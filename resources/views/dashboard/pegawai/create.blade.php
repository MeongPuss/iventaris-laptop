@extends('template.main')
@section('title', 'Tambah Pegawai')

@section('content')
     <!-- Start Content-->
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Pegawai</a></li>
                            <li class="breadcrumb-item active">Tambah Pegawai</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Pegawai</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pegawai.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="nip">NIP<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nip"
                                    name="nip" placeholder="Input NIP Pegawai">
                            </div>
                            <div class="form-group">
                                <label for="nama_pegawai">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                    placeholder="Input Nama Pegawai">
                            </div>
                            <div class="form-group">
                                <label for="description">Unit<span class="text-danger">*</span></label>
                                <select class="form-control" id="unit_id" name="unit_id">
                                    @foreach ($unit as $units)
                                        <option value="{{ $units->id }}">{{ $units->nama_unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="status_pegawai">Status<span class="text-danger">*</span></label>
                                <select class="form-control" id="status_pegawai" name="status_pegawai">
                                    <option value="1">Aktif</option>
                                    <option value="2">Tidak Aktif</option>
                                </select>
                            </div>
                            <button class="btn btn-success btn-rounded waves-effect waves-light">
                                <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Simpan
                            </button>
                        </form>

                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <!-- end col -->

        </div>

    </div> <!-- container -->
@endsection
