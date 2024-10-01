<?php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('login'); // Renderiza o arquivo login.blade.php
});




// Rota para a tela de listagem de usuários
Route::get('/users', function () {
   return view('users');
});


// Rota para exibir o formulário de cadastro de usuario
Route::get('/newuser', function () {
    return view('newuser');
});

// Rota para exibir o formulário de cadastro de permissão
Route::get('/groups', function () {
    return view('groups');
});

// Rota para exibir o formulário de cadastro de permissão
Route::get('/newgroup', function () {
    return view('newgroup');
});