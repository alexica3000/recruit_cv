<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class DevCompaniesSeeder extends Seeder
{
    public function run(): void
    {
        Company::factory()->count(50)->create();
    }
}
