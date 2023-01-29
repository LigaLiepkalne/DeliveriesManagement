<?php

namespace App\Http\Controllers\ClientDeliveries;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DeliveryController extends Controller
{
    public function index($id): View
    {
        $clientDeliveryData = DB::table('clients')
            ->join('addresses', 'clients.id', '=', 'addresses.client_id')
            ->join('deliveries', 'addresses.id', '=', 'deliveries.address_id')
            ->join('routes', 'deliveries.route_id', '=', 'routes.id')
            ->join('delivery_lines', 'deliveries.id', '=', 'delivery_lines.delivery_id')
            ->select(
                'clients.id as client_id',
                'clients.name',
                'clients.phone',
                'clients.email',
                'addresses.title',
                'routes.date',
                DB::raw('SUM(delivery_lines.price * delivery_lines.qty) as price_sum'),
                DB::raw('(CASE
                WHEN deliveries.status = 1 THEN "not delivered"
                WHEN deliveries.status = 2 THEN "delivered"
                ELSE "canceled" END) as status'),
            )
            ->where('clients.id', $id)
            ->groupBy('clients.id', 'addresses.id', 'deliveries.id', 'routes.date')
            ->get();

        return view('deliveries.deliveries', [
            'clientDeliveryData' => $clientDeliveryData,
        ]);
    }
}
