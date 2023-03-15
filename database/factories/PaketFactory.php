<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paket>
 */
class PaketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_outlet' => Arr::random([1, 2, 3]),
            'nama_paket' => fake()->word(),
            'jenis' => Arr::random(['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain']),
            'harga' => Arr::random([12000, 5000, 9000, 14000]),
        ];
    }
}
