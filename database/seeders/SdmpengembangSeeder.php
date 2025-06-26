<?php

namespace Database\Seeders;

use App\Models\Sdmpengembang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SdmpengembangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sdmpengembang::factory()->count(4)->create();
    }
}
