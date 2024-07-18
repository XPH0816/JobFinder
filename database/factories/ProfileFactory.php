<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use app\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'address' => $this->faker->address,
            'gender' => $this->faker->randomElement(["male", "female"]),
            'dob' => $this->faker->date,
            'experience' => $this->faker->text,
            'bio' => $this->faker->text,
            'phone' => $this->faker->phoneNumber,
            'cover_letter' => 'public/files/lHl9xFdBYKe5a8tJo0SUajeL0rver14nMATmPpPN.pdf',
            'resume' => 'public/files/lHl9xFdBYKe5a8tJo0SUajeL0rver14nMATmPpPN.pdf',
            'avatar' => '1692641585.jpg'
        ];
    }
}
