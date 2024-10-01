<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validação dos dados de entrada
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Busca o usuário pelo e-mail
        $user = User::where('email', $request->email)->first();
        
        // Verifica se o usuário existe e se a senha está correta
        if ($user && Hash::check($request->password, $user->password)) {
            // Autenticação bem-sucedida, gerar JWT aqui (ou token de autenticação)
            $token = $user->createToken('token_name')->plainTextToken; // Se estiver usando Sanctum
            return response()->json(['token' => $token]);
        }


        return response()->json(['message' => 'E-mail ou senha incorretos.'], 401);
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Deslogado com sucesso']);
    }
}