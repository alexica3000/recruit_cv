<?php

namespace Database\Factories;

use App\Models\Recruit;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecruitFactory extends Factory
{
    protected $model = Recruit::class;

    public function definition(): array
    {
        return [
            'name'        => $this->faker->name,
            'city'        => $this->faker->city,
            'job'         => $this->faker->jobTitle,
            'description' => $this->faker->sentence(20),
            'birth_date'  => $this->faker->dateTime,
        ];
    }
}
