<?php

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Food\FoodController;
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
    Route::get('/food', [FoodController::class, 'index'])->name('Food');

    // Route Users


    // Route Menu
});
