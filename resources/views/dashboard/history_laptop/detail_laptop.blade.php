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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">History</a></li>
                            <li class="breadcrumb-item active">Detail</li>
                        </ol>
                    </div>
                    <h4 class="page-title">
                            Detail {{ $laptop->sn }}
                    </h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-lg-right">
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal"
                                    data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add New</button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div> <!-- end card-box -->
            </div><!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
            @foreach ($detail as $item)
                <div class="col-lg-4">
                    <div class="text-center card-box">
                        <div class="pt-2 pb-2">
                            {{-- <img src="../assets/images/users/user-3.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image"> --}}

                            <h4 class="mt-3">
                                <p class="text-dark">
                                    @foreach ($item->laptops as $laptop)
                                        {{ $laptop->sn }} | {{ $laptop->merek }}
                                    @endforeach
                                </p>
                            </h4>
                            <p class="text-muted">
                                @foreach ($item->laptops as $laptop)
                                    {{ $laptop->sn }} || {{ $laptop->merek }}
                                @endforeach
                            </p>

                            <div class="row mt-4">
                                <div class="col-4">
                                    <div class="mt-3">
                                        <p class="mb-0 text-muted text-truncate">
                                            @if ($item->kembali == null && $item->rotasi == null)
                                                Penyerahan
                                            @elseif($item->rotasi != null)
                                                Rotasi
                                            @else
                                                Pengembalian
                                            @endif
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <p class="mb-0 text-muted text-truncate">
                                            {{ $item->unit }}
                                        </p>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="mt-3">
                                        <p class="mb-0 text-muted text-truncate">
                                            @if ($item->kembali == null && $item->rotasi == null)
                                                {{ $item->penyerahan }}
                                            @elseif($item->rotasi != null)
                                                {{ $item->rotasi }}
                                            @else
                                                {{ $item->kembali }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end row-->

                        </div> <!-- end .padding -->
                    </div> <!-- end card-box-->
                </div> <!-- end col -->
            @endforeach
        </div> <!-- end col -->

        <div class="row">
            <div class="col-12">
                <div class="text-right">
                    <ul class="pagination pagination-rounded justify-content-end">
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="javascript: void(0);">1</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a></li>
                        <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="javascript: void(0);" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div> <!-- container -->
@endsection
