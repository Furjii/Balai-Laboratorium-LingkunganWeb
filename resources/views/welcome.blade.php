<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> <!-- Menggunakan asset() untuk CSS -->
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-body">
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="overflow-hidden rounded shadow-lg row vw-100 vh-100">

            <!-- Left Panel (Hilang saat layar kecil) -->
            <div class="p-4 text-center text-white left-panel col-md-6 d-md-flex d-none bg-primary flex-column align-items-center justify-content-center">
                <h4 class="fw-bold fs-5">Sistem Informasi Dokumen Pengendalian Mutu</h4>
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="my-3 logo"> <!-- Ganti dengan asset() untuk gambar -->
                <h6 class="fw-bold fs-5">Balai Laboratorium Lingkungan<br>Dinas Lingkungan Hidup dan Kehutanan DIY</h6>
            </div>

            <!-- Right Panel -->
            <div class="p-4 bg-white right-panel col-md-6 d-flex flex-column align-items-center justify-content-center">

                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-3 logo-mobile d-md-none"> <!-- Ganti dengan asset() untuk gambar -->

                <h4 class="mb-4 fw-bold">Sign in</h4>
                <form class="w-50 position-relative" method="POST" action="{{ route('login') }}"> <!-- POST ke rute login -->
                    @csrf <!-- CSRF Token untuk keamanan -->
                    <div class="mb-3 position-relative">
                        <i class="fa-solid fa-user position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" class="py-2 form-control rounded-pill ps-5 input-custom" placeholder="Username" name="email" required> <!-- Ganti dengan name="email" -->
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="fa-solid fa-lock position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="password" class="py-2 form-control rounded-pill ps-5 input-custom" placeholder="Password" name="password" required> <!-- Ganti dengan name="password" -->
                    </div>
                    <div class="w-100 d-flex flex-column align-items-center">
                        <button type="submit" class="py-2 btn btn-primary rounded-pill w-50">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>
<!-- Menggunakan asset() untuk gambar -->
