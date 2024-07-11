<?php

use App\Http\Controllers\ConsultaController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Rota para receber o CPF e retornar as melhores ofertas
 * 
 */
Route::post('/ofertas', [ConsultaController::class, 'consulta'])->name('api.consulta');
Route::post('/render/boxes', [ConsultaController::class, 'renderBoxes'])->name('api.render.boxes');