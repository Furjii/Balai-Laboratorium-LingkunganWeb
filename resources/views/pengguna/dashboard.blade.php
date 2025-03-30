@extends('layouts.app')

@section('content')
            <h5 class="mb-4 fs-4">Dashboard</h5>

            <!-- Tip Section -->
            <div class="mb-4 card">
                <div class="text-white card-body bg-dark">
                    <h2 class="fs-4">TIP!</h2>
                    <h3 class="fs-6">Laboratorium Lingkungan DLHK melayani uji sampel Anda selama 20 hari kerja.</h3>
                </div>
            </div>

            <!-- About Lab Section -->
            <div class="card">
                <div class="text-center card-body">
                    <h5 class="fw-bold fs-3">Balai Laboratorium Lingkungan Dinas Lingkungan Hidup Dan Kehutanan Daerah Istimewa Yogyakarta</h5>
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="my-3" style="max-width: 200px; width: 200px;">
                    <p>KANTOR BP3KP / BALAI LABORATORIUM DLHK JL. ARGULOBAH NOMOR 19, BACIRO, GONDOKUSUMAN, YOGYAKARTA, DIY 55225</p>
                </div>
            </div>

            <!-- About Lab Text -->
            <div class="card">
                <div class="text-white card-body bg-dark">
                    <h2 class="text-center fs-5">Tentang Balai Laboratorium Lingkungan</h2>
                    <p style="font-size: 17px;">Balai Laboratorium Lingkungan adalah salah satu Unit Pelaksana Teknis di bawah Dinas Lingkungan Hidup dan Kehutanan Daerah Istimewa Yogyakarta yang ditetapkan melalui Peraturan Gubernur Daerah Istimewa Yogyakarta Nomor 95 Tahun 2018. Balai Laboratorium Lingkungan DLHK Daerah Istimewa Yogyakarta sudah mendapat akreditasi dari Komite Akreditasi Nasional (KAN) pada tanggal 18 Mei 2018 LP-1006-IDN.</p>
                </div>
            </div>

            <!-- Floating Button for Baku Mutu -->
            <div class="d-flex justify-content-end w-100">
                <a href="{{ route('baku-mutu') }}" class="my-3 btn btn-warning">
                    <i class="fa fa-flask"></i> Lihat Baku Mutu
                </a>
            </div>
        </div>
        @endsection
    </div>
    <!-- Sidebar for Mobile --> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
<!-- Add your custom JavaScript here -->
<script>
    // JavaScript for responsive navbar
    const sidebar = document.getElementById('sidebar');
    const offcanvas = new bootstrap.Offcanvas(sidebar);
    document.querySelector('.responsive-nav button').addEventListener('click', function () {
        offcanvas.toggle();
    });
</script>
