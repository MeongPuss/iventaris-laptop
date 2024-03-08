<div class="topnav shadow-lg">
    <div class="container-fluid">
        <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

            <div class="collapse navbar-collapse" id="topnav-menu-content">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="fe-airplay mr-1"></i> Dashboards
                        </a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle arrow-none" href="{{ route('dashboard') }}" id="topnav-apps" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fe-archive"></i> Data Master <div class="arrow-down"></div>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="topnav-apps">
                            <a href="{{ route('unit.index') }}" class="dropdown-item"><i class="fe-map mr-1"></i> Unit</a>
                            <a href="{{ route('pegawai.index') }}" class="dropdown-item"><i class="fe-book"></i> Pegawai</a>
                            <a href="{{ route('laptops.index') }}" class="dropdown-item"><i class="fe-map mr-1"></i> Laptop</a>
                            <a href="{{ route('it.index') }}" class="dropdown-item"><i class="fe-map mr-1"></i> ITS</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ route('history-laptop.index') }}">
                            <i class="fe-book"></i> History Laptop
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('laporan.index') }}">
                            <i class="fe-box mr-1"></i> Laporan
                        </a>
                    </li>
                </ul> <!-- end navbar-->
            </div> <!-- end .collapsed-->
        </nav>
    </div> <!-- end container-fluid -->
</div> <!-- end topnav-->
