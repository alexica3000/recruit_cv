<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DevDatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            DevUsersSeeder::class,
            DevCompaniesSeeder::class,
            DevRecruitsSeeder::class,
        ]);
    }
}
