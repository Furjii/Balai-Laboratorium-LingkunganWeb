@extends('layouts.admin-sidebar')
@section('title', 'Admin Dashboard')

@section('content')

<div class="container">
    <h2 class="my-4">Dashboard</h2>

    <!-- Dashboard Cards -->
    <div class="row">
        <!-- Card for Formulir Masuk -->
        <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
            <div class="text-white card bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Formulir Masuk</h5>
                    <p class="card-text">{{ $formulirMasukCount }} Formulir Masuk</p>
                    <a href="{{ route('masuk') }}" class="btn btn-light">Lihat Formulir</a>
                </div>
            </div>
        </div>

        <!-- Card for Formulir Disetujui -->
        <div class="mb-4 col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3">
            <div class="text-white card bg-info">
                <div class="card-body">
                    <h5 class="card-title">Jumlah Formulir Disetujui</h5>
                    <p class="card-text">{{ $formulirDisetujuiCount }} Formulir Disetujui</p>
                    <a href="{{ route('formulir.disetujui') }}" class="btn btn-light">Lihat Formulir</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
