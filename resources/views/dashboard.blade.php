@extends('layouts.app')
@section('title','Beranda')
@section('css_section')
<link rel="icon" type="image/x-icon" href="adminassets/img/favicon/favicon.ico" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<link rel="stylesheet" href="adminassets/vendor/fonts/boxicons.css" />

<link rel="stylesheet" href="adminassets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="adminassets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="adminassets/css/demo.css" />
<link rel="stylesheet" href="adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="adminassets/vendor/libs/apex-charts/apex-charts.css" />
<script src="adminassets/vendor/js/helpers.js"></script>
<script src="adminassets/js/config.js"></script>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hai {{ Auth::user()->name }} !</h5>
                            <p class="mb-4">
                                Selamat Datang di Sistem Informasi Presensi Peserta Pelatihan  Pada Balai Latihan Kerja Makassar.
                                @if (Auth::user()->name != 'admin')
                                    <br><br>
                                    <a href="{{ route('absensi.create') }}"><button class="btn btn-primary">Presensi Sekarang</button></a>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="adminassets/img/illustrations/girl-doing-yoga-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/girl-doing-yoga-light.png"
                                data-app-light-img="illustrations/girl-doing-yoga-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('js_section')
<script src="adminassets/vendor/libs/jquery/jquery.js"></script>
<script src="adminassets/vendor/libs/popper/popper.js"></script>
<script src="adminassets/vendor/js/bootstrap.js"></script>
<script src="adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="adminassets/vendor/js/menu.js"></script>
<script src="adminassets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="adminassets/js/main.js"></script>
<script src="adminassets/js/dashboards-analytics.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection
