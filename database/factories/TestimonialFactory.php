<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Testimonial>
 */
class TestimonialFactory extends Factory
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
            'name' => $this->faker->name(50),
            'profession' => $US_faker->jobTitle(),
            'content' => $this->faker->paragraph(rand(1, 20)),
            'video_id' => '28959265',
            'status' => '1',
        ];
    }
}
