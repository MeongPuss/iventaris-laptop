<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HistoryLaptopController;
use App\Http\Controllers\ItsupportController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\LaptopController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;

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


Route::prefix('dashboard')->group(function () {
    Route::get('/login', [LoginController::class, 'login'])->name('dashboard.login');
    Route::post('/login', [LoginController::class, 'authuser'])->name('dashboard.authuser');
    Route::get('/logout', [LoginController::class, 'logout'])->name('dashboard.logout');

    Route::middleware(["auth.itsupport"])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/unit', [UnitController::class, 'index'])->name('unit.index');
        Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
        Route::put('/unit/{id}/update', [UnitController::class, 'update'])->name('unit.update');
        Route::delete('/unit/{id}/delete', [UnitController::class, 'destroy'])->name('unit.destroy');
        Route::post('/unit/import/store', [UnitController::class, 'importStore'])->name('unit.import');
        Route::get('/unit/{id}/unit-create', [UnitController::class, 'getUnitCreate'])->name('unit.get.create');
        // Route::get('/unit/{id}/unit-edit-pelaksana', [UnitController::class, 'getUnitPelaksana'])->name('unit.get.edit.pelaksana');
        Route::get('/unit/{id}/unit-edit', [UnitController::class, 'getUnitEdit'])->name('unit.get.edit');

        Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai.index');
        Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
        Route::post('/pegawai/store', [PegawaiController::class, 'store'])->name('pegawai.store');
        Route::get('/pegawai/{id}/edit', [PegawaiController::class, 'edit'])->name('pegawai.edit');
        Route::put('/pegawai/{id}/update', [PegawaiController::class, 'update'])->name('pegawai.update');
        Route::delete('/pegawai/{id}/delete', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');
        Route::post('/pegawai/import/store', [PegawaiController::class, 'importStore'])->name('pegawai.import');

        Route::get('/laptops', [LaptopController::class, 'index'])->name('laptops.index');
        Route::get('/laptops/create', [LaptopController::class, 'create'])->name('laptops.create');
        Route::post('/laptops/store', [LaptopController::class, 'store'])->name('laptops.store');
        Route::get('/laptops/{id}/edit', [LaptopController::class, 'edit'])->name('laptops.edit');
        Route::put('/laptops/{id}/update', [LaptopController::class, 'update'])->name('laptops.update');
        Route::delete('/laptops/{id}/delete', [LaptopController::class, 'destroy'])->name('laptops.destroy');
        Route::post('/laptops/import/store', [LaptopController::class, 'importStore'])->name('laptops.import');

        Route::get('/history-laptop', [HistoryLaptopController::class, 'index'])->name('history-laptop.index');
        Route::get('/history-laptop/create', [HistoryLaptopController::class, 'create'])->name('history-laptop.create');
        Route::post('/history-laptop/store', [HistoryLaptopController::class, 'store'])->name('history-laptop.store');
        Route::get('/history-laptop/{id}/history/pegawai', [HistoryLaptopController::class, 'showPegawai'])->name('history-laptop.detail.pegawai');
        Route::get('/history-laptop/{id}/history/laptop', [HistoryLaptopController::class, 'showLaptop'])->name('history-laptop.detail.laptop');
        Route::post('/history-laptop/import/store', [HistoryLaptopController::class, 'import'])->name('history-laptop.import');
        Route::get('/history-laptop/export', [HistoryLaptopController::class, 'export'])->name('history-laptop.export');

        Route::get('/report', [LaporanController::class, 'index'])->name('laporan.index');
    });
});
