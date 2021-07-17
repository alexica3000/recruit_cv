<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    public function run(): void
    {
        $companies = [
            ['name' => 'Google', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Marius Co', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'ANSP Co', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Info Company Trade', 'created_at' => now(), 'updated_at' => now()],
        ];

        Company::query()->insert($companies);
    }
}
