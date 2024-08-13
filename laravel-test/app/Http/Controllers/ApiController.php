<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entity;

class ApiController extends Controller
{
    public function getByCategory($category)
    {
        $entities = Entity::with('category')
            ->whereHas('category', function ($query) use ($category) {
                $query->where('category', $category);
            })->get();

        return response()->json([
            'success' => true,
            'data' => $entities,
        ]);
    }
}
