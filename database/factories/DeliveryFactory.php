<?php

namespace Database\Factories;

use App\Models\Address;
use App\Models\Delivery;
use App\Models\Route;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        //$addressIds = Address::pluck('id');

        return [
            'route_id' => Route::factory(),
            'address_id' => Address::factory(),
            'type' => $this->faker->randomElement(Delivery::DELIVERY_TYPES),
            'status' => $this->faker->randomElement(Delivery::DELIVERY_STATUSES),
        ];


    }
}
