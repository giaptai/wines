<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderDetail>
 */
class OrderDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'price' => $this->faker->randomDigit(),
            'product_name' => $this->faker->name(),
            'quantity' => $this->faker->randomDigit(),
            'order_id' => Order::factory()
        ];
    }
}
