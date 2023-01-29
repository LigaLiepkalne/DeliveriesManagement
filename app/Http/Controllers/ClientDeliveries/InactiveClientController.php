<?php

namespace App\Http\Controllers\ClientDeliveries;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class InactiveClientController extends Controller
{
    public function index(): View
    {
        $currentPage = request()->query('page', 1);
        $key = 'materialDeliveries' . $currentPage;

        $onlyMaterialDeliveries = Cache::remember($key, 60, function () {
            return DB::table('deliveries')
                ->join('addresses', 'deliveries.address_id', '=', 'addresses.id')
                ->join('clients', 'addresses.client_id', '=', 'clients.id')
                ->select( 'clients.name', 'addresses.title')
                ->whereNotExists(function ($query) {
                    $query->select(DB::raw(1))
                        ->from('addresses')
                        ->join('deliveries', 'addresses.id', '=', 'deliveries.address_id')
                        ->whereRaw('addresses.client_id = clients.id')
                        ->whereIn('deliveries.type', [1, 3]);
                })
                ->orderBy('clients.name')
                ->paginate(10);
        });

        return view('deliveries.inactive-clients', [
            'onlyMaterialDeliveries' => $onlyMaterialDeliveries,
        ]);
    }
}
