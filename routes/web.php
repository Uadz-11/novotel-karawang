<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

require __DIR__.'/auth.php';

use App\Http\Controllers\KamarController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\ReservasiController;

// ADMIN CRUD
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('kamar', KamarController::class);
    Route::resource('tamu', TamuController::class);
    Route::resource('reservasi', ReservasiController::class);
});

// RESEPSIONIS CRUD (akses terbatas)
Route::middleware(['auth', 'role:resepsionis'])->group(function () {
    Route::resource('reservasi', ReservasiController::class);
    Route::resource('tamu', TamuController::class);
  Route::resource('kamar', KamarController::class);
});



Route::middleware(['auth', 'role:admin,resepsionis'])->group(function () {
    Route::resource('kamar', KamarController::class);
    Route::resource('tamu', App\Http\Controllers\TamuController::class);
    Route::resource('reservasi', App\Http\Controllers\ReservasiController::class);
});


// Ubah dari ini:
// Route::get('/kamar', [KamarController::class, 'index']);

// Menjadi ini:
Route::get('/kamar', [KamarController::class, 'index'])->name('kamar.index');
Route::get('/tamu', [TamuController::class, 'index'])->name('tamu.index');
Route::get('/reservasi', [ReservasiController::class, 'index'])->name('reservasi.index');

Route::middleware(['auth'])->group(function () {
    Route::resource('kamar', KamarController::class);
});



Route::middleware(['auth'])->group(function () {
    Route::resource('kamar', KamarController::class);
});




