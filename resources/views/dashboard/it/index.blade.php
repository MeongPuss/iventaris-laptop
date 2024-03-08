@extends('template.main')
@section('title', 'IT Support')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">IT Support</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">IT Support</h4>
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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="header-title">
                            <a href="{{ route('it.create') }}" class="btn btn-rounded btn-primary waves-effect waves-light">
                                <span class="btn-label">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                Tambah
                            </a>
                        </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($itSupport as $it)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $it->nip }} </td>
                                        <td> {{ $it->nama_it }} </td>
                                        <td> {{ $it->username }} </td>
                                        <td>
                                            <a href="{{ route('it.show', ['id' => $it->id]) }}"
                                                class="btn btn-rounded btn-info waves-effect waves-light btn-sm"> <span
                                                    class="btn-label"><i
                                                        class="mdi mdi-alert-circle-outline"></i></span>Detail</a>
                                            <a href="{{ route('it.edit', ['id' => $it->id]) }}"
                                                class="btn btn-rounded btn-warning waves-effect waves-light btn-sm"> <span
                                                    class="btn-label"><i class="mdi mdi-alert"></i></span>Ubah</a>
                                            <a href="{{ route('it.destroy', ['id' => $it->id]) }}"
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
            const data = {{ Js::from($itSupport) }};
            data.forEach(function(value, index) {
                const list = document.querySelectorAll("#hapus");
                list[index].removeAttribute("style");
            })
        }
    </script>
    @include('sweetalert::alert')
@endsection
