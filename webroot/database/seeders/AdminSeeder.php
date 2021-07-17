<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    const ADMIN_EMAIL = 'admin@admin.com';

    public function run(): void
    {
        $admin = User::query()->where('email', self::ADMIN_EMAIL)->first();

        if (!$admin) {
            User::factory(['name' => 'Admin', 'email' => self::ADMIN_EMAIL, 'role_id' => User::ROLE_ADMIN])->create();
        }
    }
}
