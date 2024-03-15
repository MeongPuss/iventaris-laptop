@extends('template.main')
@section('title', 'History Laptop')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">History Laptop</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">History Laptop</h4>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-lg-right">
                                <a href="{{ route('history-laptop.export') }}" class="btn btn-rounded btn-success waves-effect waves-light" _blank><i
                                        class="mdi mdi-plus-circle mr-1"></i> Laporan</a>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div> <!-- end card-box -->
            </div><!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="header-title">
                            <a href="{{ route('history-laptop.create') }}"
                                class="btn btn-rounded btn-primary waves-effect waves-light">
                                <i class="fas fa-plus-circle"></i>
                                Tambah
                            </a>
                            <button type="button" class="btn btn-rounded btn-info waves-effect waves-light"
                                data-toggle="modal" data-target="#import-hitory-laptop">
                                <i class="fe-upload-cloud"></i>
                                Import
                            </button>


                            <div id="import-hitory-laptop" class="modal fade" tabindex="-1" role="dialog"
                                aria-labelledby="importModal" aria-hidden="true" style="display: none;">
                                @include('dashboard.history_laptop.import')
                            </div><!-- /.modal -->
                        </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Unit</th>
                                    <th>SN Laptop</th>
                                    <th>Penyerahan</th>
                                    <th>Rotasi</th>
                                    <th>Pengembalian</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($historys as $history)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        @foreach ($history->pegawais as $pegawai)
                                            <td> {{ $pegawai->nama_pegawai }}</td>
                                        @endforeach
                                        <td> {{ $history->unit }} </td>
                                        @foreach ($history->laptops as $laptop)
                                            <td> {{ $laptop->sn }} </td>
                                        @endforeach
                                        <td> {{ $history->penyerahan }} </td>
                                        <td> {{ $history->rotasi }} </td>
                                        <td> {{ $history->kembali }} </td>
                                        <td>
                                            @if ($history->kembali == null && $history->rotasi == null)
                                                <span class="badge badge-success">Penyerahan</span>
                                            @elseif($history->rotasi != null && $history->kembali == null)
                                                <span class="badge badge-warning">Rotasi</span>
                                            @else
                                                <span class="badge badge-danger">Pengembalian</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('history-laptop.detail.pegawai', ['id' => $history->pegawai_id]) }}"
                                                class="btn btn-info btn-rounded waves-effect waves-light btn-sm">
                                                <i class="mdi mdi-alert-circle-outline"> </i> Detail Pegawai
                                            </a>

                                            <a href="{{ route('history-laptop.detail.laptop', ['id' => $history->laptop_id]) }}"
                                                class="btn btn-info btn-rounded waves-effect waves-light btn-sm">
                                                <i class="mdi mdi-alert-circle-outline"> </i> Detail Laptop
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
                searching: false,
                ordering: false
            });
        });
    </script>
    <script>
        window.setTimeout(enableDelete, 5000)

        function enableDelete() {
            const data = {{ Js::from($historys) }};
            data.forEach(function(value, index) {
                const list = document.querySelectorAll("#hapus");
                list[index].removeAttribute("style");
            })
        }
    </script>
    @include('sweetalert::alert')
@endsection
