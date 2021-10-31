<?php

use App\Http\Controllers\API\TenantController;
use Illuminate\Http\Request;
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


});

Route::post('tenantauth', [TenantController::class, 'register']);
Route::post('tenantlogin', [TenantController::class, 'login']);
