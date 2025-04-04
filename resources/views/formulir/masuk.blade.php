@extends('layouts.admin-sidebar')

@section('content')
    <h2 class="my-4">Formulir Masuk</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

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
                <th>Payment Proof</th> <!-- Add new column for Payment Proof -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formulirsMasuk as $index => $formulir)
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
                                {{ $parameter->parameter }} <br>
                            @endif
                        @endforeach
                    </td>
                    <td>{{ number_format($formulir->total_harga, 2) }}</td>
                    <td>{{ $formulir->status }}</td>

                    <!-- Payment Proof Column -->
                    <td>
                        @if($formulir->payment_proof)
                            <!-- Display the Payment Proof (Image or PDF) -->
                            <a href="{{ asset('storage/' . $formulir->payment_proof) }}" target="_blank" class="btn btn-info btn-sm">View</a>
                        @else
                            <span class="text-muted">No proof uploaded</span>
                        @endif
                    </td>

                    <td>
                        @if($formulir->deleted_at)
                            <td>Deleted by {{ $formulir->deleted_by }} on {{ $formulir->deleted_at }}</td>
                        @else
                            <!-- Show 'Setujui' if not deleted -->
                            <form action="{{ route('formulir.setujui', $formulir->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure you want to approve this form?')">Setujui</button>
                            </form>

                            <!-- Delete button -->
                            <form action="{{ route('formulir.delete', $formulir->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this form?')">Delete</button>
                            </form>

                            <!-- Edit button -->
                            <a href="{{ route('formulir.edit', $formulir->id) }}" class="btn btn-warning">Edit</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
