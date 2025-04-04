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
use Illuminate\Support\Facades\Auth;


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
            'parameters' => 'required|array', // Ensure parameters are passed as an array
        ]);

        // Calculate total price based on selected parameters
        $total_harga = 0;

        // Loop through selected parameters to calculate total price
        foreach ($request->parameters as $parameter_id) {
            $parameter = BakuMutu::find($parameter_id);

            // Ensure that the harga is added as a float or integer
            if ($parameter) {
                $total_harga += $parameter->harga;
            }
        }

        try {
            // Save the form data including the total_harga
            FormulirUji::create(array_merge($request->all(), ['total_harga' => $total_harga, 'updated_by' => Auth::id()]));

            // Redirect back to the form with a success message
            return redirect()->route('formulir.create')->with('success', 'Formulir Uji successfully submitted!');
        } catch (\Exception $e) {
            // Redirect back to the form with an error message
            return redirect()->route('formulir.create')->with('error', 'Failed to save Formulir Uji! Error: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $validated = $request->validate([
            'nama_instansi' => 'required',
            'email' => 'required|email',
            'no_telepon' => 'required',
            'jenis_contoh_uji' => 'required',
            'parameters' => 'required', // Ensure parameters are passed
            'jumlah_sample' => 'required|integer',  // Ensure the jumlah_sample is passed
        ]);

        // Calculate total price based on selected parameters
        $total_harga = 0;
        foreach ($request->parameters as $parameter_id) {
            $parameter = BakuMutu::find($parameter_id);
            if ($parameter) {
                $total_harga += $parameter->harga;
            }
        }

        try {
            // Retrieve the specific FormulirUji by its ID
            $formulir = FormulirUji::findOrFail($id);

            // Update the FormulirUji data
            $formulir->update([
                'nama_instansi' => $validated['nama_instansi'],
                'email' => $validated['email'],
                'no_telepon' => $validated['no_telepon'],
                'jenis_contoh_uji' => $validated['jenis_contoh_uji'],
                'parameters' => $validated['parameters'], // Updated parameters
                'total_harga' => $total_harga,  // Update total_harga
                'jumlah_sample' => $validated['jumlah_sample'],  // Update jumlah_sample
                'updated_by' => Auth::user()->name,  // Track the user who made the edit
            ]);

            // Redirect back to the history page with a success message
            return redirect()->route('formulir.history')->with('success', 'Formulir Uji updated successfully!');
        } catch (\Exception $e) {
            // Redirect back with an error message
            return redirect()->route('formulir.history')->with('error', 'Failed to update Formulir Uji! Error: ' . $e->getMessage());
        }
    }


    // Show the history of all the "Formulir Uji"
    public function showHistory()
    {
        // Fetch all FormulirUji records, including the 'payment_proof' path
        $formulirs = FormulirUji::all();

        // Return the 'history' view and pass the formulir data
        return view('formulir.history', compact('formulirs'));
    }

    public function history()
    {
        // Fetch Formulir Uji data, along with the payment proof
        $formulirs = FormulirUji::all(); // Assuming the payment proof is in the 'payment_proof' column

        return view('formulir.history', compact('formulirs'));
    }



    public function edit($id)
    {
        // Retrieve the FormulirUji data for editing by ID
        $formulir = FormulirUji::findOrFail($id);

        // Fetch all the available parameters for selection
        $parameters = BakuMutu::all();

        // Return the 'edit' view with the formulir and parameters data
        return view('formulir.edit', compact('formulir', 'parameters'));
    }

    // FormulirUjiController.php

    public function viewFormulirMasuk()
    {
        // Fetch all 'Masuk' status records
        $formulirsMasuk = FormulirUji::where('status', 'Masuk')->get();

        // Return the view with the formulir data
        return view('formulir.masuk', compact('formulirsMasuk'));
    }

    public function destroy($id)
    {
        // Find the FormulirUji by ID
        $formulir = FormulirUji::findOrFail($id);

        // Track who deleted the data
        $formulir->deleted_by = Auth::user()->name;  // Store the name of the user who deleted it

        // Soft delete the record
        $formulir->delete();

        // Save the deleted_by information
        $formulir->save();

        // Redirect back to the list with success message
        return redirect()->route('masuk')->with('success', 'Formulir Uji deleted successfully (soft delete)!');
    }

    public function disetujui()
    {
        // Fetch all formulir with the status 'Disetujui'
        $formulirsDisetujui = FormulirUji::where('status', 'Disetujui')->get();

        // Return the 'disetujui' view and pass the formulirs data
        return view('formulir.disetujui', compact('formulirsDisetujui'));
    }
}
