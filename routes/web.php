<?php

use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\JadwalController;
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
    // return view('welcome');
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('jadwal', JadwalController::class);
    Route::resource('absensi', AbsensiController::class);
    Route::post('absensi-akhir', [AbsensiController::class, 'absenAkhir'])->name('absensi.akhir');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('absensi-data', [AbsensiController::class, 'data'])->name('absensi.data');
    Route::get('rekap', [AbsensiController::class, 'rekap'])->name('rekap');
    Route::get('rekap-export', [AbsensiController::class, 'export'])->name('rekap.export');
    Route::get('absensi-detail/{user}', [AbsensiController::class, 'detail'])->name('absensi.detail');
});

require __DIR__ . '/auth.php';
