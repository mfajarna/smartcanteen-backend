<?php

use App\Http\Controllers\API\DepositController;
use App\Http\Controllers\API\MenuController;
use App\Http\Controllers\API\OverallmenuController;
use App\Http\Controllers\API\TenantController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserApkController;
use App\Http\Controllers\API\UsersmenuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(function(){

    // Route API Tenant
    Route::get('fetchtenant', [TenantController::class, 'fetch']);
    Route::post('updateProfileTenant', [TenantController::class, 'updateProfile']);
    Route::post('tenant/photo', [TenantController::class, 'updatePhoto']);
    Route::post('tenant/logout', [TenantController::class, 'logout']);
    Route::post('tenant/update/status', [TenantController::class, 'updateStatus']);


    // Route API Menu
    Route::post('menu/input', [MenuController::class, 'addMenu']);
    Route::post('menu/updatePhoto/{id}', [MenuController::class, 'updatePhoto']);
    Route::post('menu/updateMenu/{id}', [MenuController::class, 'updateMenu']);
    Route::get('menu/detailMenu/{id}', [MenuController::class, 'detailMenu']);
    Route::post('menu/deleteMenu/{id}', [MenuController::class, 'deleteMenu']);
    Route::get('menu/fetch', [MenuController::class, 'all']);
    Route::get('menu/fetchByTenant', [MenuController::class, 'fetchByTenant']);
    Route::post('menu/update/price/{id}', [MenuController::class, 'updatePrice']);
    Route::post('menu/update/status/{id}', [MenuController::class, 'updateStatus']);
    Route::post('menu/update/photo/{id}', [MenuController::class, 'updatePhotoMenu']);
    Route::get('menu/getKodeMenu', [MenuController::class, 'getKodeMenu']);


    // Overall Menu
    Route::post('overall/add', [OverallmenuController::class, 'add']);
    Route::get('overall/fetch', [OverallmenuController::class, 'fetch']);
    Route::get('overall/getLastCountOrder', [OverallmenuController::class, 'getLastCountOrder']);




    
    // Route API Transactions By User
    Route::get('transactions/user/fetch', [UsersmenuController::class,'checkTransactionUsers']); // Fetch Transactions Order on User
    Route::post('transactions/user/updateStatus', [UsersmenuController::class, 'cancelStatusOrder']); // Update Status Cancel
    Route::get('transactions/user/detail', [UsersmenuController::class, 'detailTransaction']);


    Route::get('userapk/fetch', [UserApkController::class, 'getDataUser']);

    // Route API Transaction
    Route::get('transactions/getKode', [TransactionController::class, 'getKode']);
    Route::post('transactions/add', [TransactionController::class, 'addTransaction']);


});

Route::post('tenantauth', [TenantController::class, 'register']);
Route::post('tenantlogin', [TenantController::class, 'login']);
Route::get('tenant/idtenant', [TenantController::class, 'getIdTenant']);

// Route API Users
Route::get('users/menu/fetch', [UsersmenuController::class, 'fetch']);
Route::get('users/menu/fetch/several', [UsersmenuController::class, 'fetchSeveralItems']);
Route::get('users/menu/fetch/byTenant', [UsersmenuController::class, 'fetchByTenant']);

// Route API Get Tenant
Route::get('tenant/fetch/several', [TenantController::class, 'getTenant']);
Route::post('tenant/update/device_token', [TenantController::class, 'deviceToken']);





// Users Input About Rating
Route::post('tenant/rating/{id}', [TenantController::class, 'updateRating']);
Route::post('tenant/updatePerhitunganAkhir/{id}', [TenantController::class, 'updatePerhitunganAkhir']);
Route::post('tenant/updateTotalJumlahOrder/{id}', [TenantController::class, 'updateTotalJumlahOrder']);


// UserAPK Check and Create
Route::post('userapk', [UserApkController::class, 'validation']);



// Deposit Balanced
Route::get('deposit_user', [DepositController::class, 'create']);


    // Transactions Tenant Side
    Route::get('transactions/tenant/fetch', [TransactionController::class, 'checkOrderByTenant']); // Check Transaction order by tenant
    Route::post('transactions/tenant/updateStatus/{id}', [TransactionController::class, 'changeStatusOrder']); // Update Status Transactions