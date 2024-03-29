<?php

use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ProbeController;
use App\Http\Controllers\Api\CustomerController;
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

// Route::middleware('auth:api')->group(function (Request $request) {
//     Route::apiResource('Probe','App\Http\Controllers\Api\ProbeController@show');
// });

// Route::get('/Probe','App\Http\Controllers\Api\ProbeController@show');
Route::get('/Probe', [ProbeController::class, 'show']);
Route::post('/Probe', [ProbeController::class, 'store']);
Route::get('/Probe/detail/{id}',[ProbeController::class, 'show']);
Route::post('/Probe/update', [ProbeController::class, 'updateprobe']);
Route::post('/Probe/invisible', [ProbeController::class, 'destroy']);



//** customer **//
Route::get('/customers/{id?}', [CustomerController::class, 'index']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::get('/customers/detail/{id}', [CustomerController::class, 'detail']);
Route::post('/customers/update', [CustomerController::class, 'update']);

//** employee **//
Route::get('/employee/{id?}', [EmployeeController::class, 'index']);
Route::post('/employee', [EmployeeController::class, 'store']);
Route::post('/employee/update', [EmployeeController::class, 'update']);
