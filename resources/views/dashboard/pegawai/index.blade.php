@extends('template.main')
@section('title', 'Pegawai')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Pegawai</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Pegawai</h4>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @elseif (($message = Session::get('error')) and ($fail = Session::get('faileds')))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
                <ol>
                    @foreach ($fail as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ol>
            </div>
        @endif
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="header-title">
                            <a href="{{ route('pegawai.create') }}"
                                class="btn btn-rounded btn-primary waves-effect waves-light">
                                <span class="btn-label">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                Tambah
                            </a>
                            <button type="button" class="btn btn-rounded btn-info waves-effect waves-light"
                                data-toggle="modal" data-target="#import-pegawai">
                                <span class="btn-label">
                                    <i class="fe-upload-cloud"></i>
                                </span>
                                Import
                            </button>


                            <div id="import-pegawai" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="importModal" aria-hidden="true" style="display: none;">
                                @include('dashboard.pegawai.import')
                            </div><!-- /.modal -->
                        </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Unit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $pegawais)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $pegawais->nip }} </td>
                                        <td> {{ $pegawais->nama_pegawai }} </td>
                                        <td> {{ $pegawais->unit->nama_unit }}</td>
                                        <td> {!! $pegawais->status_pegawai == 1
                                            ? '<span class="badge badge-success">Aktif</span>'
                                            : '<span class="badge badge-danger">Mutasi</span>' !!} </td>
                                        <td>
                                            <a href="#"
                                                class="btn btn-info btn-rounded waves-effect waves-light btn-sm">
                                                <span class="btn-label"><i
                                                        class="mdi mdi-alert-circle-outline"></i></span>Detail
                                            </a>
                                            <a href="{{ route('pegawai.edit', ['id' => $pegawais->id]) }}"
                                                class="btn btn-warning btn-rounded waves-effect waves-light btn-sm">
                                                <span class="btn-label"><i class="mdi mdi-alert"></i></span>Ubah
                                            </a>
                                            <a href="{{ route('pegawai.destroy', ['id' => $pegawais->id]) }}"
                                                class="btn btn-rounded btn-danger waves-effect waves-light btn-sm"
                                                data-confirm-delete="true"
                                                style="pointer-events: none; display: inline-block;" id="hapus">
                                                <span class="btn-label"><i
                                                        class="mdi mdi-close-circle-outline"></i></span>Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div> <!-- end card body-->
                </div> <!-- end card -->
            </div><!-- end col-->
        </div>

    </div> <!-- container -->
@endsection

@section('style')
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/css/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('script')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/dataTables.bootstrap4.min.js') }}"></script>

    <script src="{{ asset('assets/js/dropify.min.js') }}"></script>
    <script src="{{ asset('assets/js/dropzone.min.js') }}"></script>
    <script src="{{ asset('assets/js/form-fileuploads.init.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable-buttons').DataTable({
                lengthChange: false,
                searching: true,
                ordering: false
            });
        });
    </script>
    <script>
        window.setTimeout(enableDelete, 5000)

        function enableDelete() {
            const data = {{ Js::from($pegawai) }};
            data.forEach(function(value, index) {
                const list = document.querySelectorAll("#hapus");
                list[index].removeAttribute("style");
            })
        }
    </script>
    @include('sweetalert::alert')
@endsection
