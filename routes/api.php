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
    Route::get('fetchtenant', [TenantController::class, 'fetch']);

});

Route::post('tenantauth', [TenantController::class, 'register']);
Route::post('tenantlogin', [TenantController::class, 'login']);
