<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;

class EntityController extends Controller
{
    public function index()
    {
        // Recupera todas las entidades de la base de datos
        $entities = Entity::all();

        // Devuelve una respuesta JSON
        return response()->json([
            'success' => true,
            'data' => $entities
        ]);
    }
}
