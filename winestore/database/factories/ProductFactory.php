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
            'country' => rand(1,3),
            'brand' => rand(1,3),
            'category' => rand(1,3),
            'tone' => rand(10,25),
            'year' => fake()->year(),
            'description' => fake()->text(180),
            'quantity' => rand(1,30),
            'price' => rand(100000, 200000000)
        ];
    }
}
