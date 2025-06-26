<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sdmpengembang>
 */
class SdmpengembangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pengembangan_id' => $this->faker->numberBetween(1, 8),
            'nama_pengembang' => fake()->name(),
            'alamat_pengembang' => fake()->address(),
            'nohp_pengembang' => fake()->phoneNumber(),
            'nokantor_pengembang' => fake()->phoneNumber(),
            'email_pengembang' => fake()->unique()->safeEmail(),
        ];
    }
}
