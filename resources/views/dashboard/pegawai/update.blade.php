@extends('template.main')
@section('title', 'Ubah Pegawai')

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
                            <li class="breadcrumb-item active">Ubah Pegawai</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Ubah Pegawai</h4>
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
                        <form method="POST" action="{{ route('pegawai.update', ['id' => $pegawai->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nip">NIP<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nip" name="nip"
                                    placeholder="Input NIP Pegawai" value="{{ $pegawai->nip }}">
                            </div>
                            <div class="form-group">
                                <label for="nama_pegawai">Nama<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai"
                                    placeholder="Input Nama Pegawai" value="{{ $pegawai->nama_pegawai }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Unit<span class="text-danger">*</span></label>
                                <select class="form-control" id="unit_id" name="unit_id">
                                    @foreach ($unit as $units)
                                        <option value="{{ $units->id }}"
                                            {{ $pegawai->unit_id == $units->id ? 'selected' : '' }}>
                                            {{ $units->nama_unit }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama_pegawai">Nama<span class="text-danger">*</span></label>
                                <select class="form-control" id="status_pegawai" name="status_pegawai">
                                    <option value="1" {{ $pegawai->status_pegawai == 1 ? 'selected' : '' }}>Aktif
                                    </option>
                                    <option value="2" {{ $pegawai->status_pegawai == 2 ? 'selected' : '' }}>Tidak
                                        Aktif</option>
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
