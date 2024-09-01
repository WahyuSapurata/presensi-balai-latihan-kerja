@extends('layouts.app')
@section('title','Presensi')
@section('css_section')
<link rel="icon" type="image/x-icon" href="../adminassets/img/favicon/favicon.ico" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

<link rel="stylesheet" href="../adminassets/vendor/fonts/boxicons.css" />

<link rel="stylesheet" href="../adminassets/vendor/css/core.css" class="template-customizer-core-css" />
<link rel="stylesheet" href="../adminassets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
<link rel="stylesheet" href="../adminassets/css/demo.css" />
<link rel="stylesheet" href="../adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
<link rel="stylesheet" href="../adminassets/vendor/libs/apex-charts/apex-charts.css" />
<script src="../adminassets/vendor/js/helpers.js"></script>
<script src="../adminassets/js/config.js"></script>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-12 mb-4 order-0">
            @if (session('status'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Hai {{ Auth::user()->name }} !</h5>
                            <p class="mb-4">
                                Silahkan melakukan presensi untuk hari ini ({{ \Carbon\Carbon::parse(date('Y-m-d'))->isoFormat('D MMMM Y') }}).
                                <br><br>
                                @if (isset($checkAbsen))
                                    @if($checkAbsen->waktu_akhir == NULL)
                                        <button type="button" class="btn btn-info" id="openAbsenAkhirModal">Presensi Akhir</button>
                                    @else
                                        <button type="button" class="btn btn-success">Terima Kasih</button>
                                    @endif
                                @else
                                    <button type="button" class="btn btn-primary" id="openAbsenModal">Presensi Awal</button>
                                @endif
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="../adminassets/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- resources/views/absen.blade.php -->

<div class="modal fade" id="absenModal" tabindex="-1" role="dialog" aria-labelledby="absenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="absenModalLabel">Formulir Presensi</h5>
            </div>
            <div class="modal-body">
                <!-- Formulir Absen -->
                <form action="{{ route('absensi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fotoSelfie">Foto Selfie</label>
                        <input type="file" class="form-control" id="fotoSelfie" name="foto_awal" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeAbsenModal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Presensi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="absenAkhirModal" tabindex="-1" role="dialog" aria-labelledby="absenAkhirModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="absenAkhirModalLabel">Formulir Presensi</h5>
            </div>
            <div class="modal-body">
                <!-- Formulir Absen -->
                <form action="{{ route('absensi.akhir') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="fotoSelfie">Foto Selfie</label>
                        <input type="file" class="form-control" id="fotoSelfie" name="foto_akhir" accept="image/*" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="closeAbsenAkhirModal" class="btn btn-secondary">Close</button>
                        <button type="submit" class="btn btn-primary">Presensi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js_section')
<script src="../adminassets/vendor/libs/jquery/jquery.js"></script>
<script src="../adminassets/vendor/libs/popper/popper.js"></script>
<script src="../adminassets/vendor/js/bootstrap.js"></script>
<script src="../adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../adminassets/vendor/js/menu.js"></script>
<script src="../adminassets/vendor/libs/apex-charts/apexcharts.js"></script>
<script src="../adminassets/js/main.js"></script>
<script src="../adminassets/js/dashboards-analytics.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script>
    $(document).ready(function() {
        $('#openAbsenModal').click(function() {
            $('#absenModal').modal('show');
        });

        $('#closeAbsenModal').click(function() {
            $('#absenModal').modal('hide');
        });

        $('#openAbsenAkhirModal').click(function() {
            $('#absenAkhirModal').modal('show');
        });

        $('#closeAbsenAkhirModal').click(function() {
            $('#absenAkhirModal').modal('hide');
        });
    });
</script>
@endsection
