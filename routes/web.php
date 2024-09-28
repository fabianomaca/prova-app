<?php
// routes/web.php
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
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