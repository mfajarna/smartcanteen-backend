<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Food\FoodController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Laporan\LogLaporanController;
use App\Http\Controllers\Tenant\TenantController;
use App\Http\Controllers\Transaction\TransactionController;
use App\Http\Livewire\Tenant\ViewTenant;
use App\Models\LogLaporan\LogLaporan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LandingController::class);


Route::group(['prefix' => 'admin', 'as'  => 'admin.', 'middleware' => ['auth', 'role:superadmin|admin1|admin2']],
    function()
    {
        // Dashboard
        Route::resource('dashboard', DashboardController::class);

        // Tenant
        Route::resource('tenant', TenantController::class);

        // Menu
        Route::resource('menu', FoodController::class);

        // Transaksi
        Route::resource('transaction', TransactionController::class);

        // Laporan
        Route::resource('laporan', LaporanController::class);
        Route::get('laporan_export/{tgl_awal}/{tgl_akhir}', [LaporanController::class, 'exportexcel'])->name('laporan.exportexcel');
        Route::get('laporan_csv', [LaporanController::class, 'exportcsv'])->name('laporan.exportexcel');

        Route::resource('log_laporan', LogLaporanController::class);
            Route::get('sendlog', [LaporanController::class, 'sendlog'])->name('admin.laporan.sendlog');

    }
);

