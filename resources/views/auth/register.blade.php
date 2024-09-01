<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../adminassets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Register Page</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../adminassets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../adminassets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../adminassets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../adminassets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../adminassets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../adminassets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../adminassets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../adminassets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../adminassets/js/config.js"></script>
    @laravelPWA
</head>

<body>
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="/" class="app-brand-link gap-2">
                                <span class="app-brand-text demo text-body fw-bolder">BLK Makassar</span>
                            </a>
                        </div>
                        <!-- /Logo -->
                        <h6 class="mb-2" style="text-align: center">- Silahkan Daftar -</h6>

                        <form class="mb-3" method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">{{ __('Username') }}</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter your username" value="{{ old('name') }}" autocomplete="name" autofocus />

                                @error('name')
                                    <h6 style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter your email" value="{{ old('email') }}" autocomplete="email" />

                                @error('email')
                                    <h6 style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password" class="form-control" name="password"
                                        aria-describedby="password" autocomplete="new-password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                                @error('password')
                                    <h6 style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password-confirm">{{ __('Confirm Password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation"
                                        aria-describedby="password_confirmation" autocomplete="new-password" />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">{{ __('Nama Lengkap') }}</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ old('nama_lengkap') }}" />
                                @error('nama_lengkap')
                                    <h6 style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jkel" class="form-label">{{ __('Jenis Kelamin') }}</label>
                                <select name="jkel" class="form-control" id="jkel">
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>

                                @error('jkel')
                                    <h6 style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="jurusan" class="form-label">{{ __('Jurusan') }}</label>
                                <select name="jurusan" class="form-control" id="jurusan">
                                    <option value="Elektronika">Elektronika</option>
                                    <option value="Bangunan">Bangunan</option>
                                    <option value="Las">Las</option>
                                    <option value="Otomotif">Otomotif</option>
                                    <option value="Listrik">Listrik</option>
                                    <option value="Tata rias">Tata rias</option>
                                    <option value="Fashion Technology">Fashion Technology</option>
                                    <option value="Teknologi Informasi dan Komunikasi">Teknologi Informasi dan Komunikasi</option>
                                    <option value="Juru Ukur">Juru Ukur</option>
                                    <option value="Juru Gambar">Juru Gambar</option>
                                    <option value="Operator Cabinet Making">Operator Cabinet Making</option>
                                    <option value="Desain Grafis Mudah">Desain Grafis Mudah</option>
                                    <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                                    <option value="Barista">Barista</option>
                                </select>

                                @error('jurusan')
                                    <h6 style="color: red">{{ $message }}</h6>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary d-grid w-100">{{ __('Register') }}</button>
                        </form>

                        <p class="text-center">
                            <span>Sudah memiliki akun?</span>
                            <a href="{{ route('login') }}">
                                <span>Login sekarang</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>

    <!-- / Content -->
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
</body>

</html>
