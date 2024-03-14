@extends('template.main')
@section('title', 'Ubah IT Support')

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
                            <li class="breadcrumb-item active">Ubah IT Support</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Ubah IT Support</h4>
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

        <form method="POST" action="{{ route('it.update', ['id' => $itSupport->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nip">NIP<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nip" name="nip"
                                            placeholder="Input NIP IT Support" required value="{{ $itSupport->nip }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_it">Nama<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="nama_it" name="nama_it"
                                            placeholder="Input Nama IT Support" required value="{{ $itSupport->nama_it }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="username">Username<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="username" name="username"
                                            placeholder="Input Username" required value="{{ $itSupport->username }}">
                                    </div>
                                    <button class="btn btn-success btn-rounded waves-effect waves-light mt-2">
                                        <span class="btn-label"><i class="mdi mdi-check-all"></i></span>Simpan
                                    </button>
                                </div>
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
                                        <input type="checkbox" class="custom-control-input" id="unit_id_{{ $unit->id }}"
                                            name="unit_id[]" value="{{ $unit->id }}"
                                            {{ in_array($unit->id, $itUnit) ? 'checked' : '' }}>
                                        <label class="custom-control-label"
                                            for="unit_id_{{ $unit->id }}">{{ $unit->nama_unit }}</label>
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
