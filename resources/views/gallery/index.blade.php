@extends('layouts.admin-sidebar')

@section('content')
<div class="container">
    <h2 class="my-4">Galeri Dokumen Formulir</h2>

    <!-- Date Filter Section -->
    <form method="GET" action="{{ route('gallery') }}" class="mb-4">
        <div class="d-flex">
            <div class="me-3">
                <label for="start_date" class="form-label">Dari Tanggal</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="{{ request('start_date') }}">
            </div>

            <div class="me-3">
                <label for="end_date" class="form-label">Sampai Tanggal</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="{{ request('end_date') }}">
            </div>

            <button type="submit" class="btn btn-primary align-self-end">Filter</button>
        </div>
    </form>

    <!-- Display Documents -->
    <div class="row">
        @foreach($files as $file)
            <div class="mb-4 col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $file->file_name }}</h5>
                        <p class="card-text">Tanggal Upload: {{ $file->created_at->format('d M Y') }}</p>
                        <a href="{{ asset('storage/' . $file->file_path) }}" class="btn btn-info" target="_blank">Lihat Dokumen</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $files->links() }}
    </div>
</div>
@endsection
