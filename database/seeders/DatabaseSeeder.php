<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ClientSeeder::class,
            RouteSeeder::class,
            DeliveryLineSeeder::class,
        ]);

    }
/*
    public function duplicateAddresses()
    {
//create 10% duplicate records in deliveries table for testing, but change the delivery type
        $deliveries = Delivery::all();
        $deliveries->each(function ($delivery) {
            if (rand(1, 10) == 1) {
                $delivery->type = $delivery->type == 1 ? 2 : 1;
                $delivery->save();
            }
        });
    }
*/
}
