<?php

namespace Database\Seeders;

use App\Models\DeliveryLine;
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
        DeliveryLine::factory()->count(1500)->create();
    }
}
