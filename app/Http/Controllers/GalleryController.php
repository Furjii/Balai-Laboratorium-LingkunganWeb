<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\UploadedFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GalleryController extends Controller
{
    public function index(Request $request)
    {
        // Fetch files based on the date range filter (if any)
        // $query = UploadedFile::query();

        // // Apply date filter if provided
        // if ($request->has('start_date') && $request->has('end_date')) {
        //     $query->whereBetween('created_at', [
        //         Carbon::parse($request->start_date)->startOfDay(),
        //         Carbon::parse($request->end_date)->endOfDay(),
        //     ]);
        // }

        // // Get the filtered files
        // $files = $query->paginate(10);

        return view('gallery.index', compact('files'));
    }
}
