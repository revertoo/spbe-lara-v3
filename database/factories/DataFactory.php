<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'application_id' => $this->faker->numberBetween(1, 8),
            'siapa_produsen_data' => fake()->sentence(),
            'siapa_pengguna_data_yg_dihasilkan_sistem' => fake()->sentence(),
            'kapan_update_data_terakhir' => fake()->date(),
            'data_sistem_menggunakan_kode_referensi' => fake()->word(),
            'app_memiliki_kebijakan_privasi_terkait_data' => fake()->word(),
            'siapa_melakukan_backup' => fake()->sentence(),
            'periode_backup' => fake()->word(),
            'lokasi_penyimpanan_backup' => fake()->word(2, true),
            'kapan_terakhir_backup' => fake()->date(),
            'user_id' => $this->faker->numberBetween(1, 2),
        ];
    }
}
