<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrevisaoTempoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(PrevisaoTempoController::class)->group(function () {
    Route::post('/previsoes', 'store');
    Route::get('/previsoes', 'index');
    Route::get('/previsoes/{id}', 'show');
});