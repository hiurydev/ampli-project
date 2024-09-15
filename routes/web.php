<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrevisaoTempoController;

Route::get('/', function () {
    return view('welcome');
})->name('home-page');

Route::get('/inicio', function () {
    return view('pages.previsoes.home');
})->name('inicio');

Route::controller(PrevisaoTempoController::class)->group(function () {
    Route::get('/previsoes', 'index');
    Route::post('/previsoes', 'store');
    Route::get('/previsoes/{id}', 'show');
});