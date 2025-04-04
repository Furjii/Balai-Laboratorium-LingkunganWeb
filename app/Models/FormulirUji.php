<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;  // Import SoftDeletes


class FormulirUji extends Model
{
    use HasFactory, SoftDeletes;  // Add SoftDeletes to the model

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
        'payment_proof',  // Add this to the fillable array
        'updated_by', // Add updated_by as fillable
        'deleted_by',
        'approved_by',  // Add deleted_by to track who deleted the record

    ];


    protected $casts = [
        'parameters' => 'array', // Cast parameters to an array
        'total_harga' => 'decimal:2', // Cast total_harga to decimal with 2 decimal places
    ];
    public function DeletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    // In the FormulirUji model
}
