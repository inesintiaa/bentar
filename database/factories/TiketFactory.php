<?php

namespace Database\Factories;

use App\Models\Konser;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tiket>
 */
class TiketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'konser_id' => Konser::factory(),
            'category' => $this->faker->randomElement(['Gold', 'Silver', 'Bronze']),
            'price' => $this->faker->randomFloat(2, 50, 1000),
            'quantity' => $this->faker->numberBetween(1, 100),
        ];
    }
}
