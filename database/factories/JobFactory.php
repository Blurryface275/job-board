<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Testing\Fluent\Concerns\Has;

/**
 * @extends Factory<Job>
 */
class JobFactory extends Factory
{
    use HasFactory;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->jobTitle(), // generate random job title
            'employer_id' => Employer::factory(), // generate random employer id
            'salary' => fake()->numberBetween(30000, 100000), // generate salary
            'description' => fake()->paragraph(), // generate random job description
        ];
    }
}
