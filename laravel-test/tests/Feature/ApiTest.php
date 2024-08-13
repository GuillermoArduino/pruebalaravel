<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Entity;
use App\Models\Category;

class ApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_returns_entities_by_category()
    {
        // Crea una categoría
        $category = Category::factory()->create();

        // Crea algunas entidades asociadas a la categoría
        $entities = Entity::factory()->count(3)->create(['category_id' => $category->id]);

        // Realiza la solicitud GET a la API
        $response = $this->getJson('/api/Animals');

        // Verifica que la respuesta sea correcta
        $response->assertStatus(200)
                 ->assertJson([
                     'success' => true,
                     'data' => $entities->toArray(),
                 ]);
    }
}
