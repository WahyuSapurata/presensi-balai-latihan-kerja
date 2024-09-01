@extends('layouts.app')
@section('title','Data Jadwal')
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light"></span> Jadwal</h4>

    <!-- Bordered Table -->
    <div class="card">
        <h5 class="card-header">Data Jadwal</h5>
        <div class="card-body">

            @if (session('status'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-primary alert-dismissible" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Jam</th>
                            <th>Materi</th>
                            <th>Jurusan</th>
                            @if (auth()->user()->role == 'admin')
                            <th>Actions</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $item)
                        
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $item->tanggal }}</strong>
                        </td>
                        <td>{{ $item->jam }}</td>
                        <td>{{ $item->materi }}</td>
                        <td>{{ $item->jurusan }}</td>
                        @if (auth()->user()->role == 'admin')
                        <td>
                            <div class="dropdown">
                                <button
                                    type="button"
                                    class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown"
                                    >
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('jadwal.edit', $item->id) }}"
                                    ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                    >

                                    <form action="{{ route('jadwal.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                            <button type="submit" onclick="deleteFunction()" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                    </form>
                                        </div>
                                    </div>
                                </td>
                            @endif
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
<script>
    function deleteFunction() {
    event.preventDefault(); // prevent form submit
    var form = event.target.form; // storing the form
            swal({
        title: "Anda Yakin?",
        text: "Anda tidak akan dapat mengembalikan data ini!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#FF0000",
        confirmButtonText: "Ya, Hapus",
        cancelButtonText: "Tidak",
        closeOnConfirm: false,
        closeOnCancel: true
    },
    function(isConfirm){
        if (isConfirm) {
            form.submit();          // submitting the form when user press yes
        }
    });
    }
    </script>
    <!-- Core JS -->
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
@endsection