<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
       // $clientIds = Client::pluck('id')->map(function($clientId) {
           // return $clientId - 1500;
       // });

        $clientIds = Client::pluck('id');
        return [
            'title' => $this->faker->streetAddress,
            'client_id' => $clientIds->random(),


            //each client has one or more addresses
            //'client_id' => Client::factory(),


        ];


    }


}
