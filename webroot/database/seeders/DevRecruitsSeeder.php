<?php

namespace Database\Seeders;

use App\Models\Recruit;
use Illuminate\Database\Seeder;

class DevRecruitsSeeder extends Seeder
{
    public function run(): void
    {
        Recruit::factory()->count(50)->create();
    }
}
