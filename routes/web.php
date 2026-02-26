<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogadoresController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/jogadores', JogadoresController::class)->parameters([
    'jogadores' => 'jogador'
]);

