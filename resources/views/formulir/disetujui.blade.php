@extends('layouts.admin-sidebar')

@section('content')
    <h2 class="my-4">Formulir Disetujui</h2>

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
                <th>Di setujui oleh</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formulirsDisetujui as $index => $formulir)
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
                    </td>                    <td>{{ number_format($formulir->total_harga, 2) }}</td>
                    <td>{{ $formulir->status }}</td>
                    <td>{{ $formulir->approved_by }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
