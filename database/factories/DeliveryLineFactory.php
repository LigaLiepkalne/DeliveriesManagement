<?php

namespace Database\Factories;

use App\Models\Delivery;
use App\Models\DeliveryLine;
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

        //$delivery = Delivery::factory()->create();
        return [

            //fill delivery_id with numbers from 1 to $deliveryCount
            'delivery_id' => $this->faker->unique()->numberBetween(1, $deliveryCount),
            'item' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'qty' => $this->faker->numberBetween(1, 10),
        ];

        /*

//$deliveryIds = Delivery::pluck('id');
        return [
            'delivery_id' => $deliveryIds->random(),
            'item' => $this->faker->word,
            'price' => $this->faker->randomFloat(2, 0, 100),
            'qty' => $this->faker->numberBetween(1, 10),
        ];
        */
    }

}
