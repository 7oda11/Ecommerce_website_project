<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_name' => fake()->name(),
            'product_price' => fake()->numberBetween(100, 1000),
            'product_availability' => 'available',
            'category_id' => Category::inRandomOrder()->first()->id,
            //'user_id'=>User::inRandomOrder()->first()->id,
        ];
    }
}
