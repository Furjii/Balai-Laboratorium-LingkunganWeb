@extends('layouts.app')

@section('content')

<h2 class="my-4">Input Formulir Uji</h2>

<!-- Success or error alert -->
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

<form method="POST" action="{{ route('formulir.store') }}">
    @csrf
    <div class="row">
        <!-- Left Column -->
        <div class="col-md-6">
            <!-- 1. Data Pelanggan -->
            <div class="mb-3">
                <label for="nama_instansi" class="form-label">Nama/Instansi/Perusahaan</label>
                <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control" id="no_telepon" name="no_telepon" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>

            <!-- 2. Identitas Contoh Uji -->
            <div class="mb-3">
                <label for="jenis_contoh_uji" class="form-label">Jenis Contoh Uji</label>
                <select class="form-select" id="jenis_contoh_uji" name="jenis_contoh_uji" required>
                    <option value="">Pilih...</option>
                    <option value="air">Air</option>
                    <option value="tanah">Tanah</option>
                    <option value="udara">Udara</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="volume_contoh_uji" class="form-label">Volume Contoh Uji</label>
                <input type="text" class="form-control" id="volume_contoh_uji" name="volume_contoh_uji" required>
            </div>

            <div class="mb-3">
                <label for="jumlah_sample" class="form-label">Jumlah Sample</label>
                <input type="number" class="form-control" id="jumlah_sample" name="jumlah_sample" required>
            </div>

            <div class="mb-3">
                <label for="wadah_contoh_uji" class="form-label">Wadah Contoh Uji</label>
                <input type="text" class="form-control" id="wadah_contoh_uji" name="wadah_contoh_uji" required>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-md-6">
            <!-- Additional fields -->
            <div class="mb-3">
                <label for="kondisi" class="form-label">Kondisi</label>
                <select class="form-select" name="kondisi" required>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="pengawetan" class="form-label">Pengawetan</label>
                <select class="form-select" name="pengawetan" required>
                    <option value="beku">Beku</option>
                    <option value="biasa">Biasa</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="abnormalitas" class="form-label">Abnormalitas</label>
                <select class="form-select" name="abnormalitas" required>
                    <option value="normal">Normal</option>
                    <option value="abnormal">Abnormal</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="lokasi_pengambilan_sample" class="form-label">Lokasi Pengambilan Sample</label>
                <input type="text" class="form-control" id="lokasi_pengambilan_sample" name="lokasi_pengambilan_sample" required>
            </div>

            <div class="mb-3">
                <label for="tanggal_pengambilan_sample" class="form-label">Tanggal Pengambilan Sample</label>
                <input type="date" class="form-control" id="tanggal_pengambilan_sample" name="tanggal_pengambilan_sample" required>
            </div>

            <!-- Parameter Yang Diuji -->
            <div class="mb-3">
                <label for="parameters" class="form-label">Parameter yang Diuji</label>
                <div class="form-check">
                    @foreach($parameters as $parameter)
                        <input class="form-check-input" type="checkbox" value="{{ $parameter->id }}" id="parameter_{{ $parameter->id }}" name="parameters[]">
                        <label class="form-check-label" for="parameter_{{ $parameter->id }}">
                            {{ $parameter->parameter }}
                        </label><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript for responsive navbar
    const sidebar = document.getElementById('sidebar');
    const offcanvas = new bootstrap.Offcanvas(sidebar);
    document.querySelector('.responsive-nav button').addEventListener('click', function () {
        offcanvas.toggle();
    });
</script>
