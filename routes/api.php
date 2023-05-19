<?php

use App\Http\Controllers\apiBudayaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/budayas', [apiBudayaController::class, 'index']);
Route::post('/budayas', [apiBudayaController::class, 'store']);
Route::put('/budayas/{id}', [apiBudayaController::class, 'update']);
Route::delete('/budayas/{id}', [apiBudayaController::class, 'destroy']);
