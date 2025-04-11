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
                <th>Status</th>
                <th>Payment Proof</th> <!-- New Column for Payment Proof -->
                <th>Actions</th>
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
                    <td>
                        @foreach($formulir->parameters as $parameter_id)
                            @php
                                // Get the parameter name using the ID
                                $parameter = \App\Models\BakuMutu::find($parameter_id);
                            @endphp
                            @if($parameter)
                                {{ $parameter->parameter }},
                            @endif
                        @endforeach
                    </td>
                    <td>{{ number_format($formulir->total_harga, 2) }}</td> <!-- Display total_harga formatted -->
                    <td>{{ $formulir->status }}</td>

                    <!-- Payment Proof Display Column -->
                    <td>
                        @if($formulir->payment_proof)
                            <!-- Display the Payment Proof (Image or PDF) -->
                            <a href="{{ asset('storage/' . $formulir->payment_proof) }}" target="_blank" class="btn btn-info btn-sm">View</a>
                        @else
                            <span class="text-muted">No proof uploaded</span>
                        @endif
                    </td>

                    <!-- Actions (Upload, Edit, Export) -->
                    <td>
                        <!-- Upload Payment Proof Form for each record -->
                        <form action="{{ route('formulir.uploadPaymentProof', $formulir->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="payment_proof" class="form-label">Upload Payment Proof</label>
                                <input type="file" class="form-control" name="payment_proof" accept="image/*,application/pdf" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>

                        <!-- Edit Button -->
                        <a href="{{ route('formulir.edit', $formulir->id) }}" class="ml-2 btn btn-warning btn-sm">Edit</a>

                        <!-- Export to PDF Button for each row -->
                        <a href="{{ route('formulir.exportPDF', $formulir->id) }}" class="ml-2 btn btn-success btn-sm">Export to PDF</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
