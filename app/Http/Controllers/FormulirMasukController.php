<?php

namespace App\Http\Controllers;

use App\Models\FormulirUji;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;

class FormulirMasukController extends Controller
{
    public function __construct()
    {
        // Ensure that only authenticated users can access this controller
        $this->middleware('auth');
    }

    // Show the list of Formulir Masuk
    public function index()
    {
        // Fetch all Formulir Uji records with status 'Masuk'
        $formulirsMasuk = FormulirUji::where('status', 'Masuk')->get();

        // Return the view with formulir data
        return view('formulir.masuk', compact('formulirsMasuk'));
    }

    // Setujui the formulir, moving it to 'Disetujui' status
    public function setujui($id)
    {
        $formulir = FormulirUji::findOrFail($id);

        // Update the status and who approved it
        $formulir->status = 'Disetujui';
        $formulir->approved_by = Auth::user()->name; // Track the user who approved it
        $formulir->save();

        return redirect()->route('formulir.masuk')->with('success', 'Formulir has been approved!');
    }

    public function showDisetujui()
    {
        // Fetch the approved (Disetujui) formulir
        $formulirsDisetujui = FormulirUji::where('status', 'Disetujui')->get();

        // Show the approved formulir page
        return view('formulir.disetujui', compact('formulirsDisetujui'));
    }


    public function exportPDF($id)
    {
        // Fetch the formulir data using the provided ID
        $formulir = FormulirUji::findOrFail($id);

        // Generate the PDF using the view
        $pdf = FacadePdf::loadView('formulir.exportPDF', compact('formulir'));

        // Return the generated PDF for download
        return $pdf->download('formulir_' . $formulir->id . '.pdf');
    }

    public function uploadPaymentProof(Request $request, $id)
    {
        $formulir = FormulirUji::find($id);

        // Validate the uploaded file
        $request->validate([
            'payment_proof' => 'required|image|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Store the file in the public storage
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');

            // Store the file in the 'payment_proofs' folder inside public storage
            $path = $file->store('payment_proofs', 'public');

            // Save the file path in the database
            $formulir->payment_proof = $path;
            $formulir->save();
        }

        return back()->with('success', 'Payment proof uploaded successfully');
    }
}
