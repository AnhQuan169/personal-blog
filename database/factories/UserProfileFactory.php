<?php

namespace Database\Factories;

use App\Enums\UserGender;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class UserProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique->numberBetween(1, User::count()),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'avatar' => null,
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber(),
            'gender' => UserGender::getRandomValue(),
            'province' => $this->faker->city()
        ];
    }
}
