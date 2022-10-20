<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\products>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition()
    {
        return [
            'image' => fake()->image(),
            'name' => fake()->name(),
            'country' => fake()->country(),
            'brand' => fake()->name(),
            'category' => fake()->name(),
            'tone' => 10,
            'year' => fake()->year(),
            'description' => fake()->text(150),
            'quantity' => 10,
            'price' => 1500000
        ];
    }
}
