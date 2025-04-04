<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BakuMutu extends Model
{
    use HasFactory;

    protected $table = 'baku_mutu'; // Define the table name
    protected $fillable = ['parameter', 'satuan', 'metode_uji', 'harga']; // Define fillable columns

    // Cast 'harga' as a numeric type (float or decimal)
    protected $casts = [
        'harga' => 'float', // Ensures the 'harga' is treated as a float (for price calculations)
    ];

    /**
     * Accessor to clean and return the harga as a numeric value.
     * If stored with a currency symbol, we clean the value.
     *
     * @param string $value
     * @return float
     */
    public function getHargaAttribute($value)
    {
        // Clean the 'Rp.' prefix and commas, and convert to a float
        return (float) str_replace(['Rp. ', '.', ','], '', $value);
    }
}
