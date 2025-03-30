@extends('layouts.app')

@section('content')
    <h5 class="mb-4 fs-4">Baku Mutu</h5>

    <div class="card">
        <div class="card-header">
            <h5 class="mb-0">Data Parameter</h5>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Parameter</th>
                        <th>Satuan</th>
                        <th>Metode Uji</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $index => $item)
                        <tr>
                            <td>{{ $index + 1 + ($data->currentPage() - 1) * $data->perPage() }}</td>
                            <td>{{ $item->parameter }}</td>
                            <td>{{ $item->satuan }}</td>
                            <td>{{ $item->metode_uji }}</td>
                            <td>{{ $item->harga }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    {{ $data->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination links -->
                </ul>
            </nav>
        </div>
    </div>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
