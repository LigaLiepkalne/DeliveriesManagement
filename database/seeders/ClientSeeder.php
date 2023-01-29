<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Client;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Client::factory()->hasAddresses(3)->count(500)->create();
        Client::factory()->count(500)->create();
        //clinet can have 1 to 3 addresses
      // Client::factory()->count(500)->hasAddresses()->create()->each(function ($client) {
         // $client->addresses()->saveMany(Address::factory()->count(rand(2, 4))->create());
      // });
    }

}
