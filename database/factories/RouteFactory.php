<?php

namespace Database\Factories;

use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date' => $this->faker->dateTimeBetween('-1 year', now()),
            'car_number' => $this->faker->regexify('[A-Z]{4}[0-9]{4}'),
            'status' => $this->faker->randomElement(Route::ROUTE_STATUS),
            'driver_name' => $this->faker->name,
            'car_type' => $this->faker->randomElement(Route::CAR_TYPE),
        ];
    }
}
