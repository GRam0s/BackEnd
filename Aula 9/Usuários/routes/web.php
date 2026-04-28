<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

// Rotas para usuários
Route::get('/users', [UserController::class, 'show']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/users/search', [UserController::class, 'search']);
