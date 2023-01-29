<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DeliveryTypeController extends Controller
{
    public function index(): View
    {

        //select clients and addresses that have type 3 (liquid and material) from deliveries
        $multipleDeliveryTypesClients = DB::table('deliveries')
            ->join('addresses', 'deliveries.address_id', '=', 'addresses.id')
            ->join('clients', 'addresses.client_id', '=', 'clients.id')
            ->select( 'clients.name', 'addresses.title')
            ->where('type', '=', 3)
            ->paginate(10);



        //return clients that have both liquid and material deliveries
     //   $multipleDeliveryTypes = DB::table('clients')->where('id', 1)->get();
/*
        $multipleDeliveryTypes = DB::table('clients')
            ->join('addresses', 'clients.id', '=', 'addresses.client_id')
            ->join('deliveries', 'addresses.id', '=', 'deliveries.address_id')
            ->select(
                'clients.id as client_id',
                'clients.name',
                'clients.phone',
                'clients.email',
                'addresses.title',
                DB::raw('(CASE
                WHEN deliveries.type = 1 THEN "liquid"
                WHEN deliveries.type = 2 THEN "material"
                ELSE "unknown" END) as type'),
            )
            ->groupBy('clients.id', 'addresses.id', 'deliveries.id')
            ->get();

*/
        return view('delivery-types', [
            'multipleDeliveryTypesClients' => $multipleDeliveryTypesClients,
        ]);
    }

}
