<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrevisaoTempoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inicio', function () {
    return view('pages.provisoes.home');
})->name('inicio');

Route::controller(PrevisaoTempoController::class)->group(function () {
    Route::get('/previsoes', 'index');
    Route::post('/previsoes', 'store');
    Route::get('/previsoes/{id}', 'show');
});