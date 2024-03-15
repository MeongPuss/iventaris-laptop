@extends('template.main')
@section('title', 'Tambah History Laptop')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('history-laptop.index') }}">History Laptop</a></li>
                            <li class="breadcrumb-item active">Tambah History Laptop</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah History Laptop</h4>
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
                        <form method="POST" action="{{ route('history-laptop.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="pegawai_id">Nama Pegawai<span class="text-danger">*</span></label>
                                        <select name="pegawai_id" class="form-control">
                                            @foreach ($pegawai as $pegawais)
                                                <option value="{{ $pegawais->id }}">{{ $pegawais->nama_pegawai }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="laptop_id">Laptop<span class="text-danger">*</span></label>
                                        <select class="form-control" id="laptop_id" name="laptop_id">
                                            @foreach ($laptop as $laptops)
                                                <option value="{{ $laptops->id }}">{{ $laptops->sn }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="unit">Unit<span class="text-danger">*</span></label>
                                        <select class="form-control" id="unit" name="unit">
                                            @foreach ($unit as $units)
                                                <option value="{{ $units->nama_unit }}">{{ $units->nama_unit }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="status-laptop">Status<span class="text-danger">*</span></label>
                                        <select class="form-control" name="status" id="status-laptop"
                                            onclick="myFunction()">
                                            <option value="-">Select Status</option>
                                            <option value="penyerahan">Penyerahan</option>
                                            <option value="rotasi">Rotasi</option>
                                            <option value="pengembalian">Pengembalian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden id="penyerahan-div">
                                    <div class="form-group">
                                        <label for="penyerahan">Tanggal Penyerahan<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="penyerahan" name="penyerahan">
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden id="rotasi-div">
                                    <div class="form-group">
                                        <label for="rotasi">Tanggal Rotasi<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="rotasi" name="rotasi">
                                    </div>
                                </div>
                                <div class="col-lg-6" hidden id="kembali-div">
                                    <div class="form-group">
                                        <label for="kembali">Tanggal Kembali<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="kembali" name="kembali">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" data-plugins="dropify" name="ba" />
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


@section('style')
    <link href="{{ asset('assets/css/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('script')
    <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-fileuploads.init.js') }}"></script>
    <script>
        function myFunction() {
            let status = document.getElementById("status-laptop").value;
            let penyerahan = document.getElementById("penyerahan-div");
            let rotasi = document.getElementById("rotasi-div");
            let kembali = document.getElementById("kembali-div");
            if (status === "-" || status === "") {
                penyerahan.setAttribute("hidden", "true");
                rotasi.setAttribute("hidden", "true");
                kembali.setAttribute("hidden", "true");
            }

            if (status === "penyerahan") {
                penyerahan.removeAttribute("hidden")
                rotasi.setAttribute("hidden", "true");
                kembali.setAttribute("hidden", "true");
            }

            if (status === "rotasi") {
                penyerahan.setAttribute("hidden", "true");
                rotasi.removeAttribute("hidden")
                kembali.setAttribute("hidden", "true");
            }

            if (status === "pengembalian") {
                penyerahan.setAttribute("hidden", "true");
                rotasi.setAttribute("hidden", "true");
                kembali.removeAttribute("hidden")
            }
            console.log(status);
        }
    </script>
@endsection
