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



// Route::middleware(['auth:sanctum', 'verified'])->group(function () {

//     // Route::resource('dashboard', DashboardController::class);











//     // // Route Dashboard
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // // Route Menu
    // Route::get('/menu', [FoodController::class, 'index'])->name('Menu');
    // Route::resource('menu-resource', FoodController::class);
    // Route::get('menu/view', [FoodController::class, 'view'])->name('menu.view');



    // // Route Tenant
    // Route::get('/tenant', [TenantController::class,'index'])->name('Tenant');
    // Route::resource('tenant-user', TenantController::class);
    // Route::get('tenant/view', [TenantController::class, 'view'])->name('tenant.view');

    // // Route Users


    // // Route Menu

    // // Route Transactions
    // Route::get('/transactions', [TransactionController::class, 'index'])->name('Transactions');
    // Route::resource('transaction-user', TransactionController::class);
// });

// Route::middleware(['auth:sanctum', 'verified', 'roleaccess:2,3'])->group(function () {


//     Route::group([
//         'prefix' => 'superadmin',
//         'as' => 'superadmin.'
//     ], function(){
//         Route::resource('dashboard', DashboardController::class);
//     });

// });


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

