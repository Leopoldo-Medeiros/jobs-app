<?php

namespace Database\Factories;

use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    protected $model = Job::class;

    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'salary' => $this->faker->numberBetween(30000, 120000),
            'description' => $this->faker->paragraph(),
            'company_name' => $this->faker->company(),
            // Add other fields as needed
        ];
    }
}
