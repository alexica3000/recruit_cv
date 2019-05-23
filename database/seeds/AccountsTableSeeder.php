<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('accounts')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'manage' => 0,
            'password' => bcrypt('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
