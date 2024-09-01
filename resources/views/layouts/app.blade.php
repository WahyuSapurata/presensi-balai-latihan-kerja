<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style layout-menu-fixed" dir="ltr"
    data-theme="theme-default" data-assets-path="adminassets/" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="author" />

    @yield('css_section')

</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <img src="{{ asset('assets/images/blk.png') }}" alt="Logo" width="15px">
                    <a href="{{ url('/') }}" class="app-brand-link">
                        <span class="app-brand-text demo menu-text fw-bolder">BLK Makassar</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    <li class="menu-item {{ Request::is('dashboard') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>


                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Main Navigation</span>
                    </li>

                    @if (auth()->user()->role == 'admin')
                    <li
                        class="menu-item {{ Request::is('jadwal/create') || Request::is('jadwal') ? 'active open' : '' }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-calendar"></i>
                            <div data-i18n="Misc">Data Jadwal</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ Request::is('jadwal/create') ? 'active' : '' }}">
                                <a href="{{ route('jadwal.create') }}" class="menu-link">
                                    <div data-i18n="Error">Tambah Data</div>
                                </a>
                            </li>
                            <li class="menu-item {{ Request::is('jadwal') ? 'active' : '' }}">
                                <a href="{{ route('jadwal.index') }}" class="menu-link">
                                    <div data-i18n="Under Maintenance">Lihat Data</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item {{ Request::is('admin/absensi-data') ||  Request::is('admin/absensi-detail/*') ? 'active' : '' }}">
                        <a href="{{ route('absensi.data') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Analytics">Presensi Peserta</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('admin/rekap') ||  Request::is('admin/rekap') ? 'active' : '' }}">
                        <a href="{{ route('rekap') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div data-i18n="Analytics">Rekap</div>
                        </a>
                    </li>
                    @else
                    <li class="menu-item {{ Request::is('jadwal') ? 'active' : '' }}">
                        <a href="{{ route('jadwal.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-calendar"></i>
                            <div data-i18n="Analytics">Jadwal</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('absensi/create') ? 'active' : '' }}">
                        <a href="{{ route('absensi.create') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-pen"></i>
                            <div data-i18n="Analytics">Presensi</div>
                        </a>
                    </li>
                    <li class="menu-item {{ Request::is('absensi') ? 'active' : '' }}">
                        <a href="{{ route('absensi.index') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-file"></i>
                            <div data-i18n="Analytics">Riwayat Presensi</div>
                        </a>
                    </li>
                    @endif
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/images/users/user.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('assets/images/users/user.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">{{ Auth::user()->email }}</span>
                                                    <small class="text-muted">{{ Auth::user()->name }}</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @yield('content')
                    <!-- Footer -->
                    <footer class="content-footer footer bg-footer-theme">
                        <div
                            class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                            <div class="mb-2 mb-md-0">
                                ©
                                <script>
                                    document.write(new Date().getFullYear());

                                </script>
                                , All Right Reserved
                            </div>
                            <div>
                            </div>
                        </div>
                    </footer>
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>

                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- JAVASCRIPT -->
    @yield('js_section')
</body>

</html>
