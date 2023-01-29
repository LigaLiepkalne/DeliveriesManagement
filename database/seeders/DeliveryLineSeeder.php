<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\DeliveryLine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DeliveryLineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  $deliveryIds = Delivery::pluck('id');
      //  factory(DeliveryLine::class, 10)->create(['delivery_id' => $deliveryIds->random()]);
        DeliveryLine::factory()->count(1500)->create();

        //create as mych as delivery lines as deliveries
       // $deliveryIds = Delivery::pluck('id');
        //$deliveryLines = DeliveryLine::factory()->count($deliveryIds->count())->create(['delivery_id' => $deliveryIds]);
    }
}
