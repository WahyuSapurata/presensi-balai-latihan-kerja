@extends('layouts.app')
@section('title','Data Rekap')
@section('css_section')
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../adminassets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../adminassets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../adminassets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../adminassets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../adminassets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../adminassets/vendor/js/helpers.js"></script>

    <script src="../adminassets/js/config.js"></script>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-1"><span class="text-muted fw-light"></span> Rekap</h4>
    <a href="{{ route('rekap.export') }}" class="btn btn-primary mb-3">Export Rekap</a>

    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">Data Rekap</h5>
        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username / Password</th>
                            <th>Jenis Kelamin</th>
                            <th>Jurusan</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_lengkap }}</td>
                        <td>{{ $item->name }}<br>
                            <span class="text-muted">{{ $item->hint }}</span>
                        </td>
                        <td>{{ $item->jkel }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->email }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!--/ Bordered Table -->
</div>
@endsection

@section('js_section')
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../adminassets/vendor/libs/jquery/jquery.js"></script>
    <script src="../adminassets/vendor/libs/popper/popper.js"></script>
    <script src="../adminassets/vendor/js/bootstrap.js"></script>
    <script src="../adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../adminassets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../adminassets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection