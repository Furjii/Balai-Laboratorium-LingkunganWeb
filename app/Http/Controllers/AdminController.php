<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Retrieve all users
        return view('admin.user-management', compact('users')); // Pass users to the view
    }

    // Show the form to add a new user
    public function create()
    {
        // Pass all users to the view
        $users = User::all(); // Get all users
        return view('admin.tambah-user', compact('users')); // Pass the users to the view
    }

    // Store a new user in the database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,pengguna',
        ]);

        // Create a new user
        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        // Redirect back with a success message
        return redirect()->route('user-management')->with('success', 'User added successfully!');
    }
}
