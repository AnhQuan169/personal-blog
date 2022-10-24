<?php

namespace Database\Factories;

use App\Enums\NewsStatus;
use App\Enums\UserRole;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\User;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('role', UserRole::ADMIN())->first()->id,
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(100),
            'content' => $this->faker->text(200),
            'image' => 'images/image_demo.jpg',
            'status' => NewsStatus::getRandomValue(),
            'viewed' => $this->faker->randomNumber,
            'created_at' => Carbon::yesterday(),
            'updated_at' => Carbon::today()
        ];
    }
}
