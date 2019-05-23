<?php

use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'name' => Str::random(10),
            'logo' => Str::random(15),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
