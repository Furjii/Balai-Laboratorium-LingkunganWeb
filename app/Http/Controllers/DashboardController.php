<?php

namespace App\Http\Controllers;

use App\Models\FormulirUji;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Ensure middleware applies to both admin and user roles
    public function __construct()
    {
        $this->middleware('auth'); // Ensure that only authenticated users can access this controller
    }

    // Method to get counts for "Formulir Masuk" and "Formulir Disetujui"
    public function index()
    {
        // Fetch the count of "Formulir Masuk" and "Formulir Disetujui"
        $formulirMasukCount = FormulirUji::where('status', 'Masuk')->count();
        $formulirDisetujuiCount = FormulirUji::where('status', 'Disetujui')->count();

        // Get the logged-in user's name
        $userName = Auth::user()->name;

        // Check user role and redirect accordingly
        if (Auth::check()) {
            if (Auth::user()->role == 'admin') {
                return view('admin.dashboard', compact('formulirMasukCount', 'formulirDisetujuiCount')); // Admin dashboard view
            } elseif (Auth::user()->role == 'pengguna') {
                return view('pengguna.dashboard', compact('formulirMasukCount', 'formulirDisetujuiCount')); // User dashboard view
            }
        }

        // Default redirect if user role is not found
        return redirect('/');
    }

    // Admin Dashboard
    public function adminDashboard()
    {
        return view('admin.dashboard'); // Admin's dashboard view
    }

    // User Dashboard
    public function userDashboard()
    {
        return view('pengguna.dashboard'); // User's dashboard view
    }
}
