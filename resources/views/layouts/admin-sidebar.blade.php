<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baku Mutu - Balai Laboratorium Lingkungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 250px; /* Increased sidebar width */
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
            height: 100vh; /* Allow it to stretch fully */
        }
                /* Sidebar for mobile */
                @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: 50vh;
                position: fixed;
                top: 0;
                left: -100%;
                transition: left 0.3s ease;
            }

            .sidebar.show {
                left: 0;
            }
        }

        /* Main content area */
        .main-content {
            margin-left: 20px; /* Adjust content area to match the new sidebar width */
            margin-top: 20px; /* Ensure the content starts below the header */
        }

        /* Sidebar link styles */
        .nav-item {
            list-style-type: none;
        }

        .nav-link {
            display: block;
            padding: 10px;
            text-decoration: none;
        }

        .nav-link:hover {
            background-color: #e2e6ea;
        }
    </style>
</head>
<body>
    <!-- Top Navbar with Hamburger Button (only visible on mobile) -->
    <div class="p-3 text-white bg-dark d-flex align-items-center">
        <!-- Hamburger Menu Button (only visible on mobile) -->
<!-- Hamburger Menu Button (only visible on mobile) -->
<button class="navbar-toggler d-md-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle Sidebar" style="background-color: white; border: none;">
    <span class="navbar-toggler-icon" style="background-color: rgb(255, 255, 255);"></span>
</button>

        <img class="gambar" src="{{ asset('images/logo.png') }}" alt="Logo" width="3%">
        <h5 class="mb-0 tulisan ms-4">Balai Laboratorium Lingkungan Dinas Lingkungan Hidup dan Kehutanan DIY</h5>
    </div>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="text-center text-white ps-3 d-flex justify-content-start align-items-center" style="height: 90px; background-color: #8B5E5E;">
                <i class="fa-regular fa-user-circle fa-2x"></i>
                <div class="d-flex flex-column ms-2 text-start">
                    <span class="mb-0 fs-5 font-weight-bold">{{ Auth::user()->name }}</span> <!-- User's name, bold and left-aligned -->
                    <span class="fs-6 text-muted">{{ Auth::user()->role }}</span> <!-- User's role (Admin) -->
                </div>
            </div>

            <p class="px-3 mt-4 fw-bold text-uppercase small text-muted">Menu Navigasi</p>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link text-dark d-flex align-items-center">
                        <i class="fa fa-home me-2"></i> Home
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link text-dark d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu" role="button" aria-expanded="false" aria-controls="submenu">
                        <span><i class="fa fa-file-alt me-2"></i> Formulir </span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav flex-column ms-4">
                            <li><a href="{{ route('masuk') }}" class="nav-link text-dark">Formulir Masuk</a></li>
                            <li><a href="{{ route('formulir.disetujui') }}" class="nav-link text-dark">Formulir Disetujui</a></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="{{ route('gallery') }}" class="nav-link text-dark d-flex align-items-center">
                        <i class="fa fa-book me-2"></i> Galeri
                    </a>

                </li>
                <li>
                    <a href="{{ route('referensi') }}" class="nav-link text-dark d-flex align-items-center">
                        <i class="fa fa-book me-2"></i> Referensi
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-dark d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu" role="button" aria-expanded="false" aria-controls="submenu">
                        <span><i class="fa fa-file-alt me-2"></i> Pengaturan </span>
                        <i class="fa fa-chevron-down"></i>
                    </a>
                    <div class="collapse" id="submenu">
                        <ul class="nav flex-column ms-4">
                            <li><a href="{{ route('user-management') }}" class="nav-link text-dark">Users</a></li>
                        </ul>
                    </div>
                </li>

            <p class="px-3 mt-4 fw-bold text-uppercase small text-muted">Actions</p>
            <a href="{{ route('logout') }}" class="px-3 nav-link text-dark d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-sign-out-alt me-2"></i> Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
<!-- Sidebar for mobile (Offcanvas) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarLabel">LAB - DLHK</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="text-center text-white ps-3 d-flex justify-content-start align-items-center" style="height: 90px; background-color: #8B5E5E;">
            <i class="fa-regular fa-user-circle fa-2x"></i>
            <div class="d-flex flex-column ms-2 text-start">
                <span class="mb-0 fs-5 font-weight-bold">{{ Auth::user()->name }}</span>
                <span class="fs-6 text-muted">{{ Auth::user()->role }}</span>
            </div>
        </div>

        <p class="px-3 mt-4 fw-bold text-uppercase small text-muted">Menu Navigasi</p>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link text-dark d-flex align-items-center">
                    <i class="fa fa-home me-2"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu" role="button" aria-expanded="false" aria-controls="submenu">
                    <span><i class="fa fa-file-alt me-2"></i> Formulir </span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <div class="collapse" id="submenu">
                    <ul class="nav flex-column ms-4">
                        <li><a href="{{ route('masuk') }}" class="nav-link text-dark">Formulir Masuk</a></li>
                        <li><a href="{{ route('formulir.disetujui') }}" class="nav-link text-dark">Formulir Disetujui</a></li>
                    </ul>
                </div>
            </li>
            <li>
                <a href="{{ route('gallery') }}" class="nav-link text-dark d-flex align-items-center">
                    <i class="fa fa-book me-2"></i> Galeri
                </a>

            </li>
            <li>
                <a href="{{ route('referensi') }}" class="nav-link text-dark d-flex align-items-center">
                    <i class="fa fa-book me-2"></i> Referensi
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark d-flex justify-content-between align-items-center" data-bs-toggle="collapse" href="#submenu" role="button" aria-expanded="false" aria-controls="submenu">
                    <span><i class="fa fa-file-alt me-2"></i> Pengaturan </span>
                    <i class="fa fa-chevron-down"></i>
                </a>
                <div class="collapse" id="submenu">
                    <ul class="nav flex-column ms-4">
                        <li><a href="{{ route('user-management') }}" class="nav-link text-dark">Users</a></li>
                    </ul>
                </div>
            </li>

        <p class="px-3 mt-4 fw-bold text-uppercase small text-muted">Actions</p>
        <a href="{{ route('logout') }}" class="px-3 nav-link text-dark d-flex align-items-center" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt me-2"></i> Logout
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>

        <!-- Main Content Area -->
        <div class="container py-2 main-content">
            @yield('content') <!-- Main content of each page will go here -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
