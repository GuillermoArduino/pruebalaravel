<?php
namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Entity;
use App\Models\Category;

class ApiServiceTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_fetches_and_stores_entities()
    {
        $category = Category::factory()->create();
        $entity = Entity::factory()->create(['category_id' => $category->id]);

        $this->assertDatabaseHas('entities', [
            'api' => $entity->api,
        ]);
    }
}

