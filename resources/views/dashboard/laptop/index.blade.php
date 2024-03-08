@extends('template.main')
@section('title', 'Laptop')

@section('content')
     <!-- Start Content-->
     <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Laptop</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Laptop</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="header-title">
                            <a href="{{ route('laptops.create') }}" class="btn btn-rounded btn-primary waves-effect waves-light">
                                <span class="btn-label">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                Tambah
                            </a>

                            <button type="button" class="btn btn-rounded btn-info waves-effect waves-light" data-toggle="modal" data-target="#import-laptop">
                                <span class="btn-label">
                                    <i class="fe-upload-cloud"></i>
                                </span>
                                Import
                            </button>
                            <div id="import-laptop" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importModal" aria-hidden="true" style="display: none;">
                                @include('dashboard.laptop.import')
                            </div><!-- /.modal -->
                        </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>SN</th>
                                    <th>Laptop</th>
                                    <th>Spesifikasi</th>
                                    <th>Garansi</th>
                                    <th>Remote</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laptop as $laptops)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $laptops->sn }} </td>
                                        <td> {{ $laptops->merek }} || {{ $laptops->tipe }}</td>
                                        <td> {{ $laptops->processor }} || {{ $laptops->ram }}GB || {{ $laptops->penyimpanan }} </td>
                                        <td> {{ $laptops->garansi }} </td>
                                        <td> {{ $laptops->remote }} </td>
                                        <td>
                                            @if ($laptops->status == 1)
                                                <span class="badge badge-success">Penyerahan</span>
                                            @elseif($laptops->status == 2)
                                                <span class="badge badge-warning">Rotasi</span>
                                            @else
                                                <span class="badge badge-danger">Pengembalian</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-rounded waves-effect waves-light btn-sm">
                                                <span class="btn-label"><i class="mdi mdi-alert-circle-outline"></i></span>Detail
                                            </a>
                                            <a href="{{ route('laptops.edit', ['id' => $laptops->id]) }}" class="btn btn-warning btn-rounded waves-effect waves-light btn-sm">
                                                <span class="btn-label"><i class="mdi mdi-alert"></i></span>Ubah
                                            </a>
                                            <a href="{{ route('laptops.destroy', ['id' => $laptops->id]) }}" class="btn btn-rounded btn-danger waves-effect waves-light btn-sm" data-confirm-delete="true" style="pointer-events: none; display: inline-block;" id="hapus">
                                                <span class="btn-label"><i class="mdi mdi-close-circle-outline"></i></span>Hapus
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
        $(document).ready( function () {
            $('#datatable-buttons').DataTable({
                lengthChange: false,
                searching: true,
                ordering:  false
            });
        } );
    </script>
    <script>
        window.setTimeout(enableDelete, 5000)

        function enableDelete() {
            const data = {{ Js::from($laptop) }};
            data.forEach(function (value, index) {
                const list = document.querySelectorAll("#hapus");
                list[index].removeAttribute("style");
            })
        }
    </script>
    @include('sweetalert::alert')
@endsection
