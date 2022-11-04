<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'firstname' => $this->faker->firstName(),
            'lastname' => $this->faker->lastName(),
            'user_id' => rand(1, 6),
            'phone' => $this->faker->phoneNumber(),
            'type' => rand(1, 3),
            'email' => $this->faker->email(),
            'address' => $this->faker->streetAddress(),
            'city' => $this->faker->city(),
            'district' => $this->faker->state(),
            'wards' => $this->faker->state(),
        ];
    }
}
