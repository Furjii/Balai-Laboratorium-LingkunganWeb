<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BakuMutuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormulirUjiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth',])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);
});

// User Route
Route::middleware(['auth',])->group(function () {
    Route::get('/pengguna/dashboard', [DashboardController::class, 'userDashboard'])->name('user.dashboard');
});

Route::middleware(['auth'])->group(function () {
    // Redirect based on user role
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); // Main dashboard route
});
// routes/web.php
Route::middleware(['auth',])->get('/admin/dashboard', [DashboardController::class, 'adminDashboard']);
Route::middleware(['auth',])->get('/pengguna/dashboard', [DashboardController::class, 'userDashboard']);

// For admin role
Route::middleware(['auth',])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

// For pengguna role
Route::middleware(['auth',])->group(function () {
    Route::get('/pengguna/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
});

Route::get('/gallery/index', [GalleryController::class, 'index'])->name('gallery');


// Rute untuk login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Rute untuk logout
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Rute untuk halaman baku mutu
Route::get('/baku-mutu', function () {
    return view('baku-mutu');
})->name('baku-mutu');

Route::get('/baku-mutu', [BakuMutuController::class, 'index'])->name('baku-mutu');


// Route to show the form (create page)
Route::get('/formulir/create', [FormulirUjiController::class, 'create'])->name('formulir.create');

// Route to handle form submission and save data (store)
Route::post('/formulir/store', [FormulirUjiController::class, 'store'])->name('formulir.store');

// Route to show the form submission history (history page)
Route::get('/formulir/history', [FormulirUjiController::class, 'history'])->name('formulir.history');

Route::get('/formulir/history', [FormulirUjiController::class, 'showHistory'])->name('formulir.history');

// Admin routes
Route::middleware(['auth',])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
});

// User routes
Route::middleware(['auth',])->group(function () {
    Route::get('/pengguna/dashboard', [DashboardController::class, 'userDashboard'])->name('pengguna.dashboard');
});

// routes/web.php

Route::get('/admin/dashboard', [DashboardController::class, 'adminDashboard'])->name('admin.dashboard');
Route::get('/referensi', function () {
    return view('admin.referensi');
})->name('referensi');
Route::get('/tambah-user', function () {
    return view('admin.tambah-user');
})->name('tambah-user');


Route::middleware(['auth'])->group(function () {
    Route::get('/admin/tambah-user', [AdminController::class, 'create'])->name('admin.createUser');
    Route::post('/admin/tambah-user', [AdminController::class, 'store'])->name('admin.addUser');
});

Route::get('/admin/users', [AdminController::class, 'index'])->name('admin.users');
Route::get('/admin/tambah-user', [AdminController::class, 'create'])->name('admin.addUserForm');
Route::post('/admin/tambah-user', [AdminController::class, 'store'])->name('admin.addUser');
Route::get('/admin/edit-user/{id}', [AdminController::class, 'edit'])->name('admin.editUser');
Route::delete('/admin/delete-user/{id}', [AdminController::class, 'destroy'])->name('admin.deleteUser');

Route::prefix('admin')->middleware('auth')->group(function () {
    // Route to view the user management page
    Route::get('/users', [AdminController::class, 'index'])->name('admin.users');
    Route::get('/admin/user-management', [AdminController::class, 'index'])->name('user-management');


    // Route to show the add user form
    Route::get('/tambah-user', [AdminController::class, 'create'])->name('admin.addUserForm');

    // Route to store the new user data
    Route::post('/tambah-user', [AdminController::class, 'store'])->name('admin.addUser');
});




require __DIR__ . '/auth.php';
