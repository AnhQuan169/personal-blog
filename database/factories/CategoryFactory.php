<?php

namespace Database\Factories;

use App\Enums\CategoryStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->unique()->text(10),
            'parent_id' => null,
            'description' => $this->faker->text(100),
            'status' => CategoryStatus::getRandomValue(),
            'order_by' => null,
            'created_at' => Carbon::yesterday(),
            'updated_at' => Carbon::today()
        ];
    }
}
