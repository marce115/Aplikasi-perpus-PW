<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Models\Buku;
use App\Models\Anggota;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $totalBuku = Buku::count();
    $totalStok = Buku::sum('stok'); 
    $totalAnggota = Anggota::count();
    $peminjamanAktif = Peminjaman::where('status', 'Dipinjam')->count();
    $peminjamanTerbaru = Peminjaman::with(['buku', 'anggota'])->latest()->take(5)->get();

    return view('dashboard', compact('totalBuku', 'totalStok', 'totalAnggota', 'peminjamanAktif', 'peminjamanTerbaru'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route yang dilindungi oleh middleware auth (Harus Login dulu)
Route::middleware('auth')->group(function () {
    // Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route Buku & Peminjaman Perpustakaan
    Route::resource('buku', BukuController::class);
    
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
});

require __DIR__.'/auth.php';