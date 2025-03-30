<!-- resources/views/invoices/download.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header h1 {
            font-size: 40px;
            margin: 0;
            text-transform: uppercase;
        }
        .header .sub-header {
            font-size: 18px;
            margin: 0;
        }
        .info {
            margin-bottom: 40px;
        }
        .info td {
            padding: 5px 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
            padding: 8px;
        }
        td {
            text-align: left;
            padding: 8px;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="header">
        <h1>INVOICE</h1>
        <div class="sub-header">
            <strong>Nomor Invoice:</strong> {{ $invoice->number }}<br>
            <strong>Tanggal:</strong> {{ $invoice->created_at->format('d F Y') }}
        </div>
    </div>

    <table class="info">
        <tr>
            <td><strong>Data Pelanggan</strong></td>
            <td><strong>Data Contoh Uji</strong></td>
        </tr>
        <tr>
            <td>
                <strong>Nama:</strong> {{ $invoice->customer_name }}<br>
                <strong>Alamat:</strong> {{ $invoice->customer_address }}
            </td>
            <td>
                <strong>Jenis Contoh Uji:</strong> {{ $invoice->sample_type }}<br>
                <strong>Parameter yang diuji:</strong> {{ implode(', ', $invoice->parameters) }}
            </td>
        </tr>
    </table>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Parameter</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->parameter }}</td>
                    <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="2" class="total">Total</td>
                <td class="total">Rp. {{ number_format($invoice->total, 0, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>
</div>

</body>
</html>
