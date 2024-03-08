@extends('template.main')
@section('title', 'Laporan')

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Laporan</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Laporan</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-lg-8">
                            <form class="form-inline" method="GET">
                                <div class="form-group">
                                    <label for="status-select" class="mr-2">Sort By</label>
                                    <select class="custom-select" id="status-select" name="sort">
                                        <option selected value="0">Semua</option>
                                        <option value="1">NIP</option>
                                        <option value="2">Laptop</option>
                                    </select>
                                </div>
                                <div class="form-group mx-sm-3">
                                    <label for="inputPassword2" class="sr-only">Search</label>
                                    <div class="input-group">
                                        <input type="search" class="form-control" id="inputPassword2" placeholder="Search...">
                                        <div class="input-group-append">
                                            <button class="btn btn-info waves-effect waves-light" type="button">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="text-lg-right mt-3 mt-lg-0">
                                <button type="button" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#custom-modal"><i class="mdi mdi-plus-circle mr-1"></i> Add New</button>
                            </div>
                        </div><!-- end col-->
                    </div> <!-- end row -->
                </div> <!-- end card-box -->
            </div><!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-3.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Freddie J. Plourde</a></h4>
                        <p class="text-muted">@Founder <span> | </span> <span> <a href="#" class="text-pink">websitename.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$2563</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$29.8k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>1125</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-4.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Christopher Gallardo</a></h4>
                        <p class="text-muted">@Webdesigner  <span> | </span> <span> <a href="#" class="text-pink">abcweb.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$12.7k</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$65.3k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>2184</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-5.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Joseph M. Rohr</a></h4>
                        <p class="text-muted">@Webdesigner <span> | </span> <span> <a href="#" class="text-pink">mywebs.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$1021</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$25.6k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>325</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-6.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Mark K. Horne</a></h4>
                        <p class="text-muted">@Director  <span> | </span> <span> <a href="#" class="text-pink">profileq.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$7845</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$16.7k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>5846</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-7.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">James M. Fonville</a></h4>
                        <p class="text-muted">@Manager <span> | </span> <span> <a href="#" class="text-pink">coolweb.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$4851</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$10.2k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>895</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-8.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Jade M. Walker</a></h4>
                        <p class="text-muted">@Programmer <span> | </span> <span> <a href="#" class="text-pink">supported.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$4560</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$15.3k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>742</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-2.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Marie E. Tate</a></h4>
                        <p class="text-muted">@Webdeveloper <span> | </span> <span> <a href="#" class="text-pink">website.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$3520</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$4587</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>423</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-9.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Elyse D. Davidson</a></h4>
                        <p class="text-muted">@Webdesigner <span> | </span> <span> <a href="#" class="text-pink">dumosite.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$7851</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$16.8k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>1036</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->

            <div class="col-lg-4">
                <div class="text-center card-box">
                    <div class="pt-2 pb-2">
                        <img src="../assets/images/users/user-10.jpg" class="rounded-circle img-thumbnail avatar-xl" alt="profile-image">

                        <h4 class="mt-3"><a href="extras-profile.html" class="text-dark">Sarah E. Goin</a></h4>
                        <p class="text-muted">@Manager <span> | </span> <span> <a href="#" class="text-pink">webion.com</a> </span></p>

                        <button type="button" class="btn btn-primary btn-sm waves-effect waves-light">Message</button>
                        <button type="button" class="btn btn-light btn-sm waves-effect">Follow</button>

                        <div class="row mt-4">
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$7421</h4>
                                    <p class="mb-0 text-muted text-truncate">Post</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>$29.5k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followers</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="mt-3">
                                    <h4>11k</h4>
                                    <p class="mb-0 text-muted text-truncate">Followings</p>
                                </div>
                            </div>
                        </div> <!-- end row-->

                    </div> <!-- end .padding -->
                </div> <!-- end card-box-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->

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

    </div> <!-- container -->
@endsection

@section('style')
    <link href="{{ asset('assets/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('script')
    <script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
@endsection
