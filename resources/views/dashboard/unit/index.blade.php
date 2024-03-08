@extends('template.main')
@section('title', 'Unit')
   
@section('content')
     <!-- Start Content-->
     <div class="container-fluid">
                        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Unit</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Unit</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <div class="header-title">
                            <button type="button" class="btn btn-rounded btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">
                                <span class="btn-label">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                                Tambah
                            </button>
                            <button type="button" class="btn btn-rounded btn-info waves-effect waves-light" data-toggle="modal" data-target="#import-unit">
                                <span class="btn-label">
                                    <i class="fe-upload-cloud"></i>
                                </span>
                                Import
                            </button>
                            <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                @include('dashboard.unit.create')                                
                            </div><!-- /.modal -->

                            <div id="import-unit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="importModal" aria-hidden="true" style="display: none;">
                                @include('dashboard.unit.import')                                
                            </div><!-- /.modal -->
                        </div>
                        <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Unit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                        
                        
                            <tbody>
                                @foreach ($unit as $units)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $units->nama_unit }} </td>
                                        <td>
                                            <button type="button" class="btn btn-rounded btn-warning waves-effect waves-light btn-sm" data-toggle="modal" data-target="#modal-update-{{$units->id}}">
                                                <span class="btn-label"><i class="mdi mdi-alert"></i></span>Ubah
                                            </button>
                                            {{-- Modal Edit --}}
                                            <div id="modal-update-{{$units->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalUpdate" aria-hidden="true" style="display: none;">
                                                @include('dashboard.unit.update')                                
                                            </div>
                                            {{-- End Modal Edit --}}
                                            <a href="{{ route('unit.destroy', ['id' => $units->id   ]) }}" class="btn btn-rounded btn-danger waves-effect waves-light btn-sm" data-confirm-delete="true" style="pointer-events: none; display: inline-block;" id="hapus">
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
                searching: false,
                ordering:  false
            });
        } );
    </script>
    <script>
    window.setTimeout(enableDelete, 5000)

    function enableDelete() {
        const data = {{ Js::from($unit) }};
        data.forEach(function (value, index) {
            const list = document.querySelectorAll("#hapus");
            list[index].removeAttribute("style");
        })
    }
</script>
@include('sweetalert::alert')
@endsection