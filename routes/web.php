<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PrevisaoTempoController;
use App\Http\Controllers\Api\IntegracaoController;

Route::get('/', function () {
    return view('welcome');
})->name('home-page');

Route::get('/inicio', function () {
    return view('pages.previsoes.previsao');
})->name('inicio');

Route::get('/comparar', function () {
    return view('pages.previsoes-comparacao.previsao-comparacao');
})->name('comparar');

Route::controller(PrevisaoTempoController::class)->group(function () {
    Route::get('/previsoes', 'index');
    Route::post('/previsoes', 'store')->name('previsoes.store');
    Route::get('/previsoes/{id}', 'show');
    Route::get('/previsoes/comparar/{cidade1}/{cidade2}', 'compararClima');
});

Route::controller(IntegracaoController::class)->group(function () {
    Route::get('/obter-cidade/{cep}', 'obterCidadePorCep');
    Route::get('/obter-cidade-comparar/{cep1}/{cep2}', 'obterCidadePorCepComparar');
    Route::get('/obter-clima/{cidade}', 'obterClimaPorCidade');
});