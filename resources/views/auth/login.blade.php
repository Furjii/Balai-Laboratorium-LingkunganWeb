<body class="d-flex justify-content-center align-items-center vh-100 bg-body">
    <div class="container-fluid vh-100 d-flex justify-content-center align-items-center">
        <div class="overflow-hidden rounded shadow-lg row vw-100 vh-100">

            <!-- Left Panel -->
            <div class="p-4 text-center text-white left-panel col-md-6 d-md-flex d-none bg-primary flex-column align-items-center justify-content-center">
                <h4 class="fw-bold fs-5">Sistem Informasi Dokumen Pengendalian Mutu</h4>
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="my-3 logo">
                <h6 class="fw-bold fs-5">Balai Laboratorium Lingkungan<br>Dinas Lingkungan Hidup dan Kehutanan DIY</h6>
            </div>

            <!-- Right Panel -->
            <div class="p-4 bg-white right-panel col-md-6 d-flex flex-column align-items-center justify-content-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mb-3 logo-mobile d-md-none">
                <h4 class="mb-4 fw-bold">Sign in</h4>

                <!-- Show success or error messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form class="w-50 position-relative" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3 position-relative">
                        <i class="fa-solid fa-user position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="text" class="py-2 form-control rounded-pill ps-5 input-custom" placeholder="Username" name="email" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <i class="fa-solid fa-lock position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
                        <input type="password" class="py-2 form-control rounded-pill ps-5 input-custom" placeholder="Password" name="password" required>
                    </div>
                    <div class="w-100 d-flex flex-column align-items-center">
                        <button type="submit" class="py-2 btn btn-primary rounded-pill w-50">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
