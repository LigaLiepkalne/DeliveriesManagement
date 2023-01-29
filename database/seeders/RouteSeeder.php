<?php

namespace Database\Seeders;

use App\Models\Delivery;
use App\Models\DeliveryLine;
use App\Models\Route;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Route::factory()->count(500)->create();
        Route::factory()->count(500)->hasDeliveries(3)->hasDeliveryLines(1)->create();
    }
}
