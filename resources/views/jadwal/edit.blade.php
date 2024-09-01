@extends('layouts.app')
@section('title','Edit Data Jadwal')
@section('css_section')
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../../adminassets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../../../adminassets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../../adminassets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../../adminassets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../../adminassets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../../adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../../../adminassets/vendor/js/helpers.js"></script>

    <script src="../../../adminassets/js/config.js"></script>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"> Jadwal</h4>

    <!-- Basic Layout -->
    <div class="row">
    <div class="col-xl">
        <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Edit Jadwal</h5>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('jadwal.update', $jadwal->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label class="form-label" for="input1">Tanggal</label>
                <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="input1" name="tanggal" value="{{ old('tanggal', $jadwal->tanggal) }}" />
                <div class="invalid-feedback">
                    @error('tanggal')  
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="input4">Jam</label>
                <input type="time" class="form-control @error('jam') is-invalid @enderror" id="input4" name="jam" value="{{ old('jam', $jadwal->jam) }}" />
                <div class="invalid-feedback">
                    @error('jam')  
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="input2">Materi</label>
                <input type="text" class="form-control @error('materi') is-invalid @enderror" id="input2" name="materi" value="{{ old('materi', $jadwal->materi) }}" placeholder="Masukkan Materi" />
                <div class="invalid-feedback">
                    @error('materi')  
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="jurusan">Jurusan</label>
                <select name="jurusan" class="form-control @error('jurusan') is-invalid @enderror" id="jurusan">
                    <option value="" selected disabled>Pilih Jurusan</option>
                    <option value="Elektronika" @selected($jadwal->jurusan == 'Elektronika')>Elektronika</option>
                    <option value="Bangunan" @selected($jadwal->jurusan == 'Bangunan')>Bangunan</option>
                    <option value="Las" @selected($jadwal->jurusan == 'Las')>Las</option>
                    <option value="Otomotif" @selected($jadwal->jurusan == 'Otomotif')>Otomotif</option>
                    <option value="Listrik" @selected($jadwal->jurusan == 'Listrik')>Listrik</option>
                    <option value="Tata rias" @selected($jadwal->jurusan == 'Tata rias')>Tata rias</option>
                    <option value="Fashion Technology" @selected($jadwal->jurusan == 'Fashion Technology')>Fashion Technology</option>
                    <option value="Teknologi Informasi dan Komunikasi" @selected($jadwal->jurusan == 'Teknologi Informasi dan Komunikasi')>Teknologi Informasi dan Komunikasi</option>
                    <option value="Juru Ukur" @selected($jadwal->jurusan == 'Juru Ukur')>Juru Ukur</option>
                    <option value="Juru Gambar" @selected($jadwal->jurusan == 'Juru Gambar')>Juru Gambar</option>
                    <option value="Operator Cabinet Making" @selected($jadwal->jurusan == 'Operator Cabinet Making')>Operator Cabinet Making</option>
                    <option value="Desain Grafis Mudah" @selected($jadwal->jurusan == 'Desain Grafis Mudah')>Desain Grafis Mudah</option>
                    <option value="Administrasi Perkantoran" @selected($jadwal->jurusan == 'Administrasi Perkantoran')>Administrasi Perkantoran</option>
                    <option value="Barista" @selected($jadwal->jurusan == 'Barista')>Barista</option>
                </select>
                <div class="invalid-feedback">
                    @error('jurusan')  
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <a href="{{ route('jadwal.index') }}" class="btn btn-secondary waves-effect">
                Batal
            </a>

            <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        </div>
    </div>
    </div>
</div>
@endsection

@section('js_section')
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../../../adminassets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../../adminassets/vendor/libs/popper/popper.js"></script>
    <script src="../../../adminassets/vendor/js/bootstrap.js"></script>
    <script src="../../../adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../../../adminassets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../../../adminassets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
@endsection