<?php

namespace App\Http\Controllers;

use App\Models\Group; // Supondo que você tenha um modelo PermissionGroup
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller
{
    /**
     * List all permission groups.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $groups = Group::all(); // Obtém todos os grupos de permissão
        return response()->json($groups, 200);
    }

    /**
     * Store a new permission group.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
        ]);

        // Retornar erro de validação se falhar
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Criação do grupo de permissão
        $group = Group::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($group, 201);
    }

    /**
     * Display the specified permission group.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $group = Group::find($id);

        if (!$group) {
            return response()->json(['message' => 'Grupo não encontrado.'], 404);
        }

        return response()->json($group, 200);
    }

    /**
     * Update the specified permission group.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $group = Group::find($id);

        if (!$group) {
            return response()->json(['message' => 'Grupo não encontrado.'], 404);
        }

        // Validação dos dados
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:200',
            'description' => 'nullable|string|max:500',
        ]);

        // Retornar erro de validação se falhar
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Atualização do grupo de permissão
        $group->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($group, 200);
    }

    /**
     * Remove the specified permission group.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $group = Group::find($id);

        if (!$group) {
            return response()->json(['message' => 'Grupo não encontrado.'], 404);
        }

        $group->delete();

        return response()->json(['message' => 'Grupo deletado com sucesso.'], 204);
    }

    public function getAllGroups()
    {
        $groups = Group::all(); // Busca todos os grupos
        return response()->json($groups); // Retorna em formato JSON
    }
}