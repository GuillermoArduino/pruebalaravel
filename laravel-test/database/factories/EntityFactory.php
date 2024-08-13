<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Entity;

class EntityFactory extends Factory
{
    protected $model = Entity::class;

    public function definition()
    {
        return [
            'api' => $this->faker->word,
            'description' => $this->faker->sentence,
            'link' => $this->faker->url,
            'category_id' => \App\Models\Category::factory(), // Asegúrate de que esta relación sea válida
        ];
    }
}
