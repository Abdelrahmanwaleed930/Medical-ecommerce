<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class ProductFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word . ' ' . $this->faker->word,
            'description' => $this->faker->sentence,
            'price' => $this->faker->randomFloat(2, 10, 200),
            'category_id' => Category::inRandomOrder()->first()?->id,
            'image' => null,
        ];
    }
}