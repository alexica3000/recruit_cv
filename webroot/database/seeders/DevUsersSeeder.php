<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DevUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(250)->create()->each(function($user) {
            $user->update(['role_id' => array_rand(User::ROLES, 1)]);
        });
    }
}
