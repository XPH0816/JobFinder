<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $US_faker = \Faker\Factory::create('en_US');

        return [
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'title' => $title = $US_faker->jobTitle(),
            'slug' => Str::slug($title),
            'position' => $title,
            'address' => $this->faker->address(),
            'category_id' => rand(1, 20),
            'type' => $this->faker->randomElement(['fulltime', 'part time', 'intern', 'remote']),
            'featured' => rand(0, 1),
            'status' => 1,
            'description' => $this->faker->paragraph(rand(2, 10)),
            'roles' => $this->faker->paragraph(rand(2, 10)),
            'last_date' => $this->faker->dateTime(),
            'number_of_vacancy' => rand(1, 10),
            'experience' => rand(0, 10),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'salary' => $this->faker->randomElement(["negotiable", "1500-3000", "3000-4000", "4000-5000", "5000-6000", "6000-7000", "7000-8000", "8000-9000", "10000-15000", "15000-20000", "200000+"]),
        ];
    }
}
