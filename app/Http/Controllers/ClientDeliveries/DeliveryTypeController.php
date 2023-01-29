<?php

namespace App\Http\Controllers\ClientDeliveries;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DeliveryTypeController extends Controller
{
    public function index(): View
    {
        $currentPage = request()->query('page', 1);
        $key = 'multipleTypes' . $currentPage;

        $multipleDeliveryTypes = Cache::remember($key, 60, function () {
        return DB::table('deliveries')
            ->join('addresses', 'deliveries.address_id', '=', 'addresses.id')
            ->join('clients', 'addresses.client_id', '=', 'clients.id')
            ->select( 'clients.name', 'addresses.title')
            ->where('type', '=', 3)
            ->orderBy('clients.name')
            ->paginate(10);
        });

        return view('deliveries.delivery-types', [
            'multipleDeliveryTypes' => $multipleDeliveryTypes,
        ]);
    }
}
