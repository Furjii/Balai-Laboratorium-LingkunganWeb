@extends('layouts.app')

@section('content')
            <h2 class="my-4">Histori Formulir Uji</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis Contoh Uji</th>
                        <th>Jumlah Sample</th>
                        <th>Tanggal Masuk</th>
                        <th>Parameter</th>
                        <th>Total Harga</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Unggah Berkas</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($formulirs as $index => $formulir)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $formulir->nama_instansi }}</td>
                            <td>{{ $formulir->jenis_contoh_uji }}</td>
                            <td>{{ $formulir->jumlah_sample }}</td>
                            <td>{{ $formulir->created_at }}</td>
                            <td>{{ implode(', ', $formulir->parameters) }}</td>
                            <td>{{ $formulir->total_harga }}</td>
                            <td>{{ $formulir->status }}</td>
                            {{-- <td><a href="{{ route('upload', $formulir->id) }}" class="btn btn-success">Upload File</a></td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<script>
    // JavaScript for responsive navbar
    const sidebar = document.getElementById('sidebar');
    const offcanvas = new bootstrap.Offcanvas(sidebar);
    document.querySelector('.responsive-nav button').addEventListener('click', function () {
        offcanvas.toggle();
    });
</script>
