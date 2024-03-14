@extends('template.main')
@section('title', 'Detail IT Support')

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
                            <li class="breadcrumb-item active">Detail IT Support</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Detail IT Support</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <label class="form-control">{{ $itSupport->nip }}</label>
                                </div>
                                <div class="form-group">
                                    <label for="nama_it">Nama</label>
                                    <label class="form-control">{{ $itSupport->nama_it }}</label>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <label class="form-control">{{ $itSupport->username }}</label>
                                </div>
                                <form action=" {{ route('it.resetPassword', ['id' => $itSupport->id]) }} " method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-rounded btn-primary waves-effect waves-light mt-2">
                                        <span class="btn-label"><i class="mdi mdi-onepassword"></i></span>
                                        Reset Password
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div>
            <div class="col-6">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Unit</h4>
                            <ul class="list-group list-group-flush">
                                @foreach ($itSupport->units as $unit)
                                    <li class="list-group-item">{{ $unit->nama_unit }}</li>
                                @endforeach
                            </ul>
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
                <!-- end card-->
            </div>
        </div>
        <!-- end col -->

    </div>

    </div> <!-- container -->
@endsection
