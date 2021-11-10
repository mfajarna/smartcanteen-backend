<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Food\FoodController;
use App\Http\Controllers\Tenant\TenantController;
use App\Http\Livewire\Tenant\ViewTenant;
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

Route::get('/', function () {
    return view('app.login');
});



Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    // Route Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // Route Menu
    Route::get('/menu', [FoodController::class, 'index'])->name('Menu');
    Route::resource('menu-resource', FoodController::class);
    Route::get('menu/view', [FoodController::class, 'view'])->name('menu.view');



    // Route Tenant
    Route::get('/tenant', [TenantController::class,'index'])->name('Tenant');
    Route::resource('tenant-user', TenantController::class);
    Route::get('tenant/view', [TenantController::class, 'view'])->name('tenant.view');

    // Route Users


    // Route Menu
});
