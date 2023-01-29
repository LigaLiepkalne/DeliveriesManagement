<?php

namespace Database\Factories;

use App\Models\Delivery;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeliveryLineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $deliveryIds = Delivery::pluck('id');
        $deliveryCount = count($deliveryIds);

        return [
            'delivery_id' => $this->faker->unique()->numberBetween(1, $deliveryCount),
            'item' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'qty' => $this->faker->numberBetween(1, 10),
        ];
    }
}
