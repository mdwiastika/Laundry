<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Member>
 */
class MemberFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => fake()->name(),
            'alamat' => fake()->address(),
            'jenis_kelamin' => Arr::random(['L', 'P']),
            'tlp' => fake()->phoneNumber(),
            'keterangan' => Arr::random(['bronze', 'silver', 'gold']),
        ];
    }
}
