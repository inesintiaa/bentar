<?php

namespace Database\Factories;

use App\Models\Tiket;
use App\Models\Transaksi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Riwayat>
 */
class RiwayatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaksi_id' => Transaksi::factory(),
            'tiket_id' => $this->faker->numberBetween(16, 18),
            'quantity' => $this->faker->numberBetween(1, 10),
            'subtotal' => $this->faker->randomFloat(2, 100, 10000),
        ];
    }
}
