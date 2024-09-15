<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrevisaoTempoController;
use App\Http\Controllers\Api\IntegracaoController;

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

Route::controller(IntegracaoController::class)->group(function () {
    Route::get('/obter-cidade/{cep}', 'obterCidadePorCep');
    Route::get('/obter-clima/{cidade}', 'obterClimaPorCidade');
});