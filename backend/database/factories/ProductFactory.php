<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Origin;
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
    public function definition()
    {
        $qty = $this->faker->randomDigit(100);
        $status = $this->faker->randomDigit(3);
        $vol = $this->faker->randomDigit(100);
        $c = $this->faker->randomDigit(100);
        $price = $this->faker->randomDigit(100000);
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(50),
            'images' => $this->faker->image(),
            'quantity' => $qty,
            'status' => $status,
            'vol' => $vol,
            'c' => $c,
            'price' => $price,
            'brand_id' => Brand::factory(),
            'origin_id' => Origin::factory(),
            'category_id' => Category::factory(),
            'year' => '2022'
        ];
    }
}
