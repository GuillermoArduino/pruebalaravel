<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Category;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_category()
    {
        // Usa la fábrica para crear una categoría
        $category = Category::factory()->create(['category' => 'Test Category']);

        // Verifica que la categoría se ha creado en la base de datos
        $this->assertDatabaseHas('categories', [
            'category' => 'Test Category',
        ]);
    }
}
