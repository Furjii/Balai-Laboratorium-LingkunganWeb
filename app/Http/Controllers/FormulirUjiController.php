<?php

namespace App\Http\Controllers;

use App\Models\BakuMutu;
use App\Models\FormulirUji;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as Pdf;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class FormulirUjiController extends Controller
{
    // Show the form for creating a new "Formulir Uji"
    public function create()
    {
        $parameters = BakuMutu::all(); // Fetch parameters from BakuMutu table
        return view('formulir.create', compact('parameters'));
    }

    // Store the "Formulir Uji" in the database
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'nama_instansi' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'alamat' => 'required',
            'jenis_contoh_uji' => 'required',
            'volume_contoh_uji' => 'required|numeric',
            'jumlah_sample' => 'required|integer',
            'wadah_contoh_uji' => 'required',
            'kondisi' => 'required',
            'pengawetan' => 'required',
            'abnormalitas' => 'nullable',
            'tanggal_pengambilan_sample' => 'required|date',
            'parameters' => 'required', // Ensure parameters are passed
        ]);

        // Calculate total price based on selected parameters
        $total_harga = 0;

        // Loop through selected parameters to calculate total price
        foreach ($request->parameters as $parameter_id) {
            $parameter = BakuMutu::find($parameter_id);

            // Ensure that the harga is added as a float or integer
            if ($parameter) {
                $total_harga += (float) $parameter->harga;
            }
        }

        try {
            // Save the form data including the total_harga
            FormulirUji::create(array_merge($request->all(), ['total_harga' => $total_harga]));

            // Redirect back to the form with a success message
            return redirect()->route('formulir.create')->with('success', 'Formulir Uji successfully submitted!');
        } catch (\Exception $e) {
            // Redirect back to the form with an error message
            return redirect()->route('formulir.create')->with('error', 'Failed to save Formulir Uji! Error: ' . $e->getMessage());
        }
    }

    // Show the history of all the "Formulir Uji"
    public function showHistory()
    {
        // Fetch all FormulirUji records
        $formulirs = FormulirUji::all();

        // Return the 'history' view and pass the formulir data
        return view('formulir.history', compact('formulirs'));
    }

    public function history()
    {
        // Fetch Formulir Uji data along with the related Invoice and uploaded files
        $formulirs = FormulirUji::with('invoice', 'uploadedFiles')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('formulir.history', compact('formulirs'));
    }

    // Generate PDF invoice for a specific "Formulir Uji"
    public function generateInvoice($id)
    {
        $formulir = FormulirUji::find($id); // Get the specific formulir data by ID

        // Generate the PDF file using the data from the formulir
        $pdf = FacadePdf::loadView('formulir.invoice', compact('formulir'));

        // Download the PDF with a custom filename
        return $pdf->download('invoice-' . $formulir->id . '.pdf');
    }
}
