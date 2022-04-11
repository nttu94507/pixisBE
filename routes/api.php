<?php

use App\Http\Controllers\Api\ProbeController;
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

// Route::get('/Probe/{id?}','App\Http\Controllers\Api\ProbeController@show');
Route::get('/Probe/{id?}', [ProbeController::class, 'show']);
Route::post('/Probe', [ProbeController::class, 'store']);
Route::delete('/Probe/{id}',[ProbeController::class, 'destroy']);