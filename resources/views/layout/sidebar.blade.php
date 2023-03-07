<div>
    <div class="logo-wrapper">
        <a href="{{ route('dashboard') }}">
            <img class="img-fluid for-light" src="{{ url('public/cuba') }}/assets/images/logo/logo.png" alt="">
            <img class="img-fluid for-dark" src="{{ url('public/cuba') }}/assets/images/logo/logo_dark.png" alt="">
        </a>
        <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
    </div>
    <div class="logo-icon-wrapper"><a href="index.html"><img class="img-fluid"
                src="{{ url('cuba') }}/assets/images/logo/logo-icon.png" alt=""></a></div>
    <nav class="sidebar-main">
        <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
        <div id="sidebar-menu">
            <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="index.html"><img class="img-fluid"
                            src="{{ url('cuba') }}/assets/images/logo/logo-icon.png" alt=""></a>
                    <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2"
                            aria-hidden="true"></i></div>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav"
                        href="{{ route('dashboard') }}"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                <li class="sidebar-main-title">
                    <div>
                        <h6>Main Menu</h6>
                        {{-- <p>Ready to Use Main Menu</p> --}}
                    </div>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('pegawai') }}"><i data-feather="user">
                        </i><span>Pegawai</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('aktivasi') }}"><i
                            data-feather="check-circle"> </i><span>Aktivasi</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('absensi') }}"><i data-feather="list">
                        </i><span>Absensi</span></a>
                </li>
                <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i
                            data-feather="credit-card"></i><span>M-Pay</span></a>
                    <ul class="sidebar-submenu">
                        <li><a href="{{ route('rekening') }}">Master Rekening</a></li>
                        <li><a href="{{ route('mutasi') }}">Mutasi Simpanan</a></li>
                    </ul>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('kanban') }}"><i
                            data-feather="file-text"> </i><span>kanban Board</span></a>
                </li>
                <li class="sidebar-list">
                    <a class="sidebar-link sidebar-title link-nav" href="{{ route('tracking') }}"><i data-feather="map-pin">
                        </i><span>Tracking</span></a>
                </li>
            </ul>
        </div>
        <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
    </nav>
</div>
