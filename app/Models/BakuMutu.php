<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BakuMutu extends Model
{
    use HasFactory;

    protected $table = 'baku_mutu'; // Define the table name
    protected $fillable = ['parameter', 'satuan', 'metode_uji', 'harga']; // Define fillable columns
}
