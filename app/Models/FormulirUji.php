<?php

// app/Models/FormulirUji.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\MockObject\Rule\Parameters;

class FormulirUji extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'formulir_uji';

    protected $fillable = [
        'nama_instansi',
        'email',
        'no_telepon',
        'alamat',
        'jenis_contoh_uji',
        'volume_contoh_uji',
        'jumlah_sample',
        'wadah_contoh_uji',
        'kondisi',
        'pengawetan',
        'abnormalitas',
        'lokasi_pengambilan_sample',
        'tanggal_pengambilan_sample',
        'parameters',
        'total_harga',
        'status', // Assuming status is a column in the formulir_uji table
    ];

    protected $casts = [
        'parameters' => 'array', // Cast parameters to an array
        'total_harga' => 'decimal:2', // Cast total_harga to decimal with 2 decimal places

    ];
}
