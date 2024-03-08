@extends('template.main')
@section('title', 'Tambah IT Support')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('it.index') }}">IT Support</a></li>
                            <li class="breadcrumb-item active">Tambah IT Support</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah IT Support</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form method="POST" action="{{ route('it.store') }}">
            @csrf
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nip">NIP<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nip" name="nip"
                                            placeholder="Input NIP IT Support" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_it">Nama<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_it" name="nama_it"
                                            placeholder="Input Nama IT Support" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="username">Username<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Input Username" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password<span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Input Password" required>
                                    </div>
                                </div>
                                <button class="btn btn-success btn-rounded waves-effect waves-light mt-2">
                                    <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Simpan
                                </button>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label>Unit<span class="text-danger">*</span></label>
                                @foreach ($units as $unit)
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="unit_id_{{ $unit->id }}" name="unit_id[]"
                                            value="{{ $unit->id }}">
                                        <label class="custom-control-label" for="unit_id_{{ $unit->id }}">{{ $unit->nama_unit }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
            </div>
        </form>
        <!-- end col -->

    </div>

    </div> <!-- container -->
@endsection
