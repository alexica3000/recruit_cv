<?php

namespace Database\Seeders;

use App\Interfaces\HasRoleInterface;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;

class DevUsersSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->count(250)->create()->each(function($user) {
            /** @var User $user */
            $user->update(['role_id' => array_rand(HasRoleInterface::ROLES, 1)]);

            if ($user->role_id == HasRoleInterface::ROLE_CLIENT) {
                $company = Company::query()->inRandomOrder()->first();
                $user->company()->associate($company);
                $user->save();
            }
        });
    }
}
