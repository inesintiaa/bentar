<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonserController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserFeatureController;

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
    return view('user.login');
});

Route::get('/about', function () {
    return view('about');
});

Route::prefix('user')->group(function () {
    Route::get('/register', [UserController::class, 'register']);
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login/auth', [UserController::class, 'loginAuth'])->name('auth.login');
    Route::post('/register/store', [UserController::class, 'storeRegister'])->name('auth.register');
    Route::post('/logout', [UserController::class, 'logout'])->name('auth.logout');
    Route::get('/konser', [UserFeatureController::class, 'konser'])->name('user.konser');
    Route::get('/konser/{id}', [UserFeatureController::class, 'konsershow'])->name('user.konser.show');
    Route::get('/riwayat', [UserFeatureController::class, 'riwayat'])->name('user.riwayat');
    Route::post('/tiket/purchase/', [UserFeatureController::class, 'buytiket'])->name('user.tiket.purchase');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::prefix('peserta')->group(function () {
    Route::get('/', [PesertaController::class, 'index'])->name('admin.peserta');
    Route::get('/create', [PesertaController::class, 'create'])->name('admin.peserta.create');
    Route::get('/edit/{id}', [PesertaController::class, 'edit'])->name('admin.peserta.edit');
    Route::get('/delete/{id}', [PesertaController::class, 'destroy'])->name('admin.peserta.delete');
    Route::post('/store', [PesertaController::class, 'store'])->name('admin.peserta.store');
    Route::post('/update/{id}', [PesertaController::class, 'update'])->name('admin.peserta.update');
});

Route::prefix('konser')->group(function () {
    Route::get('/', [KonserController::class, 'index'])->name('admin.konser');
    Route::get('/create', [KonserController::class, 'create'])->name('admin.konser.create');
    Route::get('/edit/{id}', [KonserController::class, 'edit'])->name('admin.konser.edit');
    Route::get('/delete/{id}', [KonserController::class, 'destroy'])->name('admin.konser.delete');
    Route::post('/store', [KonserController::class, 'store'])->name('admin.konser.store');
    Route::post('/update/{id}', [KonserController::class, 'update'])->name('admin.konser.update');
});

Route::prefix('tiket')->group(function () {
    Route::get('/', [TiketController::class, 'index'])->name('admin.tiket');
    Route::get('/edit/{id}', [TiketController::class, 'edit'])->name('admin.tiket.edit');
    Route::post('/update/{id}', [TiketController::class, 'update'])->name('admin.tiket.update');
});

Route::prefix('riwayat')->group(function () {
    Route::get('/', [RiwayatController::class, 'index'])->name('admin.riwayat');
    Route::get('/create', [RiwayatController::class, 'create'])->name('admin.riwayat.create');
    Route::get('/edit/{id}', [RiwayatController::class, 'edit'])->name('admin.riwayat.edit');
    Route::get('/delete/{id}', [RiwayatController::class, 'destroy'])->name('admin.riwayat.delete');
    Route::post('/store', [RiwayatController::class, 'store'])->name('admin.riwayat.store');
    Route::post('/update/{id}', [RiwayatController::class, 'update'])->name('admin.riwayat.update');
});

Route::prefix('transaksi')->group(function () {
    Route::get('/', [TransaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/create', [TransaksiController::class, 'create'])->name('admin.transaksi.create');
    Route::get('/edit/{id}', [TransaksiController::class, 'edit'])->name('admin.transaksi.edit');
    Route::get('/delete/{id}', [TransaksiController::class, 'destroy'])->name('admin.transaksi.delete');
    Route::post('/store', [TransaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::post('/update/{id}', [TransaksiController::class, 'update'])->name('admin.transaksi.update');
});
