<!-- resources/views/formulir/exportPDF.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Formulir</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <h1>Formulir Uji History - PDF</h1>
    <table>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $formulir->id }}</td>
                <td>{{ $formulir->nama_instansi }}</td>
                <td>{{ $formulir->jenis_contoh_uji }}</td>
                <td>{{ $formulir->jumlah_sample }}</td>
                <td>{{ $formulir->created_at }}</td>
                <td>
                    @foreach($formulir->parameters as $parameter_id)
                        @php
                            $parameter = \App\Models\BakuMutu::find($parameter_id);
                        @endphp
                        @if($parameter)
                            {{ $parameter->parameter }},
                        @endif
                    @endforeach
                </td>
                <td>{{ number_format($formulir->total_harga, 2) }}</td>
                <td>{{ $formulir->status }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
