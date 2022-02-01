<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Food\FoodController;
use App\Http\Controllers\KeluhanController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\Laporan\LogLaporanController;
use App\Http\Controllers\MethodPayment\MethodPaymentController;
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
            Route::get('view', [TenantController::class,'view'])->name('tenant.view');
            Route::post('tenant-create',  [TenantController::class,'store'])->name('tenant.store');
            Route::get('remove-tenant', [TenantController::class,'delete'])->name('tenant.delete');

        // Menu
        Route::resource('menu', FoodController::class);
            Route::get('view-menu', [FoodController::class,'view'])->name('menu.view');

        // Transaksi
        Route::resource('transaction', TransactionController::class);
            Route::get('view-transaction', [TransactionController::class,'view'])->name('transaction.view');

        // Laporan
        Route::resource('laporan', LaporanController::class);
            Route::get('laporan_export/{tgl_awal}/{tgl_akhir}', [LaporanController::class, 'exportexcel'])->name('laporan.exportexcel');
            Route::get('laporan_export_daily/{tgl_daily}', [LaporanController::class, 'export_daily'])->name('laporan.exportexceldaily');
            Route::get('laporan_export_month/{month}', [LaporanController::class, 'export_month'])->name('laporan.exportexcelmonth');
            Route::get('laporan_export_year/{year}', [LaporanController::class, 'export_year'])->name('laporan.exportexcelyear');
            Route::get('laporan_csv/{tgl_awal}/{tgl_akhir}', [LaporanController::class, 'exportcsv'])->name('laporan.exportexcel');


        Route::resource('log_laporan', LogLaporanController::class);
            Route::get('sendlog', [LaporanController::class, 'sendlog'])->name('laporan.sendlog');

        // Keluhan
        Route::resource('keluhan', KeluhanController::class);

        // MethodPayment
        Route::resource('methodpayment', MethodPaymentController::class);
    }
);



