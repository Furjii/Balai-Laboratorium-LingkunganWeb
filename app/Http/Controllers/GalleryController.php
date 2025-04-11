<?php

namespace App\Http\Controllers;

use App\Models\UploadedFile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        //     // Fetch files based on the date range filter (if any)
        //     // $query = UploadedFile::query();

        //     // Apply date filter if provided
        //     if ($request->has('start_date') && $request->has('end_date')) {
        //         // $query->whereBetween('created_at', [
        //             Carbon::parse($request->start_date)->startOfDay(),
        //             Carbon::parse($request->end_date)->endOfDay(),
        //         ]);
        //     }

        //     // Get the filtered files
        //     $files = $query->paginate(10);

        //     // Return the view with the files data
        //     return view('gallery.index', compact('files'));
        // }

        // public function store(Request $request)
        // {
        //     // Validate the incoming request
        //     $request->validate([
        //         'payment_proof' => 'required|file|mimes:jpg,png,pdf|max:2048',
        //     ]);

        //     // Store the uploaded file in the 'payment_proofs' directory
        //     $file = $request->file('payment_proof');
        //     $filePath = $file->storeAs('payment_proofs', $file->getClientOriginalName(), 'public');

        //     // // // Create a new record in the database (assuming you have a model and a migration for the 'uploaded_files' table)
        //     // // UploadedFile::create([
        //     // //     'file_name' => $file->getClientOriginalName(),
        //     // //     'file_path' => $filePath,
        //     // //     'created_at' => now(),
        //     // ]);

        return redirect()->route('gallery.index')->with('success', 'File uploaded successfully.');
    }
}
