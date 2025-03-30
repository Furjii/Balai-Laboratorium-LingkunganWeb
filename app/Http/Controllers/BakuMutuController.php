<?php

namespace App\Http\Controllers;

use App\Models\BakuMutu;
use Illuminate\Http\Request;

class BakuMutuController extends Controller
{
    public function index()
    {
        // Get all data from baku_mutu table and paginate
        $data = BakuMutu::paginate(10); // Paginate data with 10 items per page
        return view('baku-mutu', compact('data')); // Pass the data to the view
    }
}
