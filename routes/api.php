<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;


// Rota da API para pegar os dados dos usuários (essa já deve existir)
Route::get('/api/users', [UserController::class, 'index']);

// Rota POST para cadastrar o usuário
Route::post('/api/newuser', [RegisterController::class, 'store']);

// Adicione a rota para deletar o usuário
Route::delete('/api/newuser/{id}', [RegisterController::class, 'destroy']);


//Rotas para grupos
// Rota POST para cadastrar o usuário
Route::post('/api/groups', [GroupController::class, 'store']);