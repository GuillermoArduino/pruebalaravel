<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Entity;
use App\Models\Category;

class EntityTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_an_entity()
    {
        // Usa la fábrica para crear una categoría
        $category = Category::factory()->create();

        // Usa la fábrica para crear una entidad asociada a la categoría
        $entity = Entity::factory()->create(['category_id' => $category->id]);

        // Verifica que la entidad se ha creado en la base de datos
        $this->assertDatabaseHas('entities', [
            'api' => $entity->api,
        ]);
    }
}
