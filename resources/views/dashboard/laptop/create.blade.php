@extends('template.main')
@section('title', 'Tambah Laptop')

@section('content')
     <!-- Start Content-->
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('laptops.index') }}">Laptop</a></li>
                            <li class="breadcrumb-item active">Tambah Laptop</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah Laptop</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('laptops.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="sn">SN Laptop<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="sn"
                                    name="sn" placeholder="Input SN Laptop">
                            </div>
                            <div class="form-group">
                                <label for="merek">Merek Laptop<span class="text-danger">*</span></label>
                                <select name="merek" class="form-control" >
                                    <option value="hp">HP</option>
                                    <option value="lenovo">Lenovo</option>
                                    <option value="acer">Acer</option>
                                    <option value="dell">Dell</option>
                                    <option value="asus">Asus</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="tipe">Tipe Laptop<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tipe"
                                    name="tipe" placeholder="Input Tipe Laptop">
                            </div>
                            <div class="form-group">
                                <label for="processor">Processor<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="processor"
                                    name="processor" placeholder="Input Processor Laptop">
                            </div>
                            <div class="form-group">
                                <label for="ram">RAM<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="ram"
                                    name="ram" placeholder="Input RAM Laptop">
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="penyimpanan">Penyimpanan<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="penyimpanan"
                                            name="penyimpanan" placeholder="Input Penyimpanan Laptop">
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group">
                                        <label for="kapasitas">Kapasitas<span class="text-danger">*</span></label>
                                        <select class="form-control" id="kapasitas" name="kapasitas">
                                            <option value="GB">GB</option>
                                            <option value="TB">TB</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="garansi">Garansi<span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="garansi"
                                            name="garansi" placeholder="Input SN Laptop">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="remote">Remote<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="remote"
                                    name="remote" placeholder="Input Remote Laptop">
                            </div>
                            <div class="form-group">
                                <label for="status">Status<span class="text-danger">*</span></label>
                                <select class="form-control" name="status">
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
