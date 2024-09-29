<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    // Exibir lista de usuários
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // Criar um novo usuário
    public function store(Request $request)
{
    // Validação dos dados
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8',
        'permission_group_id' => 'required|exists:groups,id',
    ]);

    // Verifica se o email já existe
    $existingUser = User::where('email', $request->email)->first();
    if ($existingUser) {
        return response()->json([
            'message' => 'Este e-mail já está em uso. Por favor, escolha outro.'
        ], 400);
    }

    // Criar o usuário
    $user = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
        'permission_group_id' => $validatedData['permission_group_id'],
    ]);

    // Retornar uma resposta JSON
    return response()->json(['message' => 'Usuário criado com sucesso!', 'user' => $user], 201);
}


    // Mostrar um único usuário
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json($user);
    }

    // Atualizar um usuário existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|string|min:8',
            'permission_group_id' => 'required|exists:groups,id',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->permission_group_id = $request->permission_group_id;
        $user->save();

        return response()->json($user);
    }

    // Excluir um usuário
    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}