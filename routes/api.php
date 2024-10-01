<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::middleware('auth:api')->group(function () {


    // Rota da API para pegar os dados dos usuários
    Route::get('/users', [UserController::class, 'index']);
    Route::post('/newuser', [UserController::class, 'store']);
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::put('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);



    //Rota da API para pegar os dados dos grupos
    Route::get('/groups', [GroupController::class, 'index']);
    Route::post('/newgroup', [GroupController::class, 'store']);
    Route::get('/group/{id}', [GroupController::class, 'show']);
    Route::put('/group/{id}', [GroupController::class, 'update']);
    Route::delete('/group/{id}', [GroupController::class, 'destroy']);

    Route::get('/groups', [GroupController::class, 'getAllGroups']);
});