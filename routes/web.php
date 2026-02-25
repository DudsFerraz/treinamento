<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JogadoresController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/jogadores', JogadoresController::class)->parameters([
    'jogadores' => 'jogador'
]);

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

