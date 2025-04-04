@extends('layouts.app')

@section('content')
    <h2 class="my-4">Edit Formulir Uji</h2>

    <form method="POST" action="{{ route('formulir.update', $formulir->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6">
                <!-- Nama Instansi/Perusahaan -->
                <div class="mb-3">
                    <label for="nama_instansi" class="form-label">Nama Instansi</label>
                    <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="{{ old('nama_instansi', $formulir->nama_instansi) }}" required>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $formulir->email) }}" required>
                </div>

                <!-- No Telepon -->
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $formulir->no_telepon) }}" required>
                </div>

                <!-- Alamat -->
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat', $formulir->alamat) }}</textarea>
                </div>

                <!-- Jenis Contoh Uji -->
                <div class="mb-3">
                    <label for="jenis_contoh_uji" class="form-label">Jenis Contoh Uji</label>
                    <select class="form-select" id="jenis_contoh_uji" name="jenis_contoh_uji" required>
                        <option value="air" @if($formulir->jenis_contoh_uji == 'air') selected @endif>Air</option>
                        <option value="tanah" @if($formulir->jenis_contoh_uji == 'tanah') selected @endif>Tanah</option>
                        <option value="udara" @if($formulir->jenis_contoh_uji == 'udara') selected @endif>Udara</option>
                    </select>
                </div>

                <!-- Volume Contoh Uji -->
                <div class="mb-3">
                    <label for="volume_contoh_uji" class="form-label">Volume Contoh Uji</label>
                    <input type="text" class="form-control" id="volume_contoh_uji" name="volume_contoh_uji" value="{{ old('volume_contoh_uji', $formulir->volume_contoh_uji) }}" required>
                </div>

                <!-- Jumlah Sample -->
                <div class="mb-3">
                    <label for="jumlah_sample" class="form-label">Jumlah Sample</label>
                    <input type="number" class="form-control" id="jumlah_sample" name="jumlah_sample" value="{{ old('jumlah_sample', $formulir->jumlah_sample) }}" required>
                </div>

                <!-- Wadah Contoh Uji -->
                <div class="mb-3">
                    <label for="wadah_contoh_uji" class="form-label">Wadah Contoh Uji</label>
                    <input type="text" class="form-control" id="wadah_contoh_uji" name="wadah_contoh_uji" value="{{ old('wadah_contoh_uji', $formulir->wadah_contoh_uji) }}" required>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Kondisi -->
                <div class="mb-3">
                    <label for="kondisi" class="form-label">Kondisi</label>
                    <select class="form-select" name="kondisi" required>
                        <option value="baik" @if($formulir->kondisi == 'baik') selected @endif>Baik</option>
                        <option value="rusak" @if($formulir->kondisi == 'rusak') selected @endif>Rusak</option>
                    </select>
                </div>

                <!-- Pengawetan -->
                <div class="mb-3">
                    <label for="pengawetan" class="form-label">Pengawetan</label>
                    <select class="form-select" name="pengawetan" required>
                        <option value="beku" @if($formulir->pengawetan == 'beku') selected @endif>Beku</option>
                        <option value="biasa" @if($formulir->pengawetan == 'biasa') selected @endif>Biasa</option>
                    </select>
                </div>

                <!-- Abnormalitas -->
                <div class="mb-3">
                    <label for="abnormalitas" class="form-label">Abnormalitas</label>
                    <select class="form-select" name="abnormalitas" required>
                        <option value="normal" @if($formulir->abnormalitas == 'normal') selected @endif>Normal</option>
                        <option value="abnormal" @if($formulir->abnormalitas == 'abnormal') selected @endif>Abnormal</option>
                    </select>
                </div>

                <!-- Lokasi Pengambilan Sample -->
                <div class="mb-3">
                    <label for="lokasi_pengambilan_sample" class="form-label">Lokasi Pengambilan Sample</label>
                    <input type="text" class="form-control" id="lokasi_pengambilan_sample" name="lokasi_pengambilan_sample" value="{{ old('lokasi_pengambilan_sample', $formulir->lokasi_pengambilan_sample) }}" required>
                </div>

                <!-- Tanggal Pengambilan Sample -->
                <div class="mb-3">
                    <label for="tanggal_pengambilan_sample" class="form-label">Tanggal Pengambilan Sample</label>
                    <input type="date" class="form-control" id="tanggal_pengambilan_sample" name="tanggal_pengambilan_sample" value="{{ old('tanggal_pengambilan_sample', $formulir->tanggal_pengambilan_sample) }}" required>
                </div>

                <!-- Parameter yang Diuji -->
                <div class="mb-3">
                    <label for="parameters" class="form-label">Parameter yang Diuji</label>
                    <div class="form-check">
                        @foreach($parameters as $parameter)
                            <input class="form-check-input" type="checkbox" value="{{ $parameter->id }}" id="parameter_{{ $parameter->id }}" name="parameters[]"
                                @if(in_array($parameter->id, $formulir->parameters)) checked @endif>
                            <label class="form-check-label" for="parameter_{{ $parameter->id }}">{{ $parameter->parameter }}</label><br>
                        @endforeach
                    </div>
                </div>

                <!-- Display the Payment Proof if available -->
                <div class="mb-3">
                    <label for="payment_proof" class="form-label">Payment Proof</label><br>
                    @if($formulir->payment_proof)
                        <a href="{{ asset('storage/payment_proofs/' . $formulir->payment_proof) }}" target="_blank">View Payment Proof</a>
                    @else
                        <span class="text-muted">No Payment Proof Uploaded</span>
                    @endif
                </div>

                <!-- Upload Payment Proof -->
                <div class="mb-3">
                    <label for="payment_proof" class="form-label">Upload New Payment Proof (if applicable)</label>
                    <input type="file" class="form-control" name="payment_proof" accept="image/*,application/pdf">
                </div>

            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
