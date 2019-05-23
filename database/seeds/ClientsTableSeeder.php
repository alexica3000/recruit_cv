<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10) . '@gmail.com',
            'department_id' => 1,
            'password' => bcrypt('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
