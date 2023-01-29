<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\Console\Input\Input;

class LastDeliveryController extends Controller
{
    public function index(): View
    {
        $clientDeliveryData = DB::table('clients')
            ->join('addresses', 'clients.id', '=', 'addresses.client_id')
            ->join('deliveries', 'addresses.id', '=', 'deliveries.address_id')
            ->join('routes', 'deliveries.route_id', '=', 'routes.id')
            ->join('delivery_lines', 'deliveries.id', '=', 'delivery_lines.delivery_id')
            ->select(
                'clients.id as client_id',
                'clients.name',
                'addresses.title',
                'routes.date',
                DB::raw('SUM(delivery_lines.price * delivery_lines.qty) as price_sum'),
                'delivery_lines.item',
            )
            ->where('deliveries.status', 2)
            ->orderBy('clients.name')
            ->groupBy('clients.id', 'addresses.id', 'deliveries.id', 'routes.date', 'delivery_lines.item')
            ->get();

        $lastDeliveries = $clientDeliveryData->groupBy('client_id')->map(function ($item) {
            return $item->sortByDesc('date')->first();
        });

        $perPage = 10;
        $total = $lastDeliveries->count();
        $currentPage = request()->query('page');
        $lastDeliveries = $lastDeliveries->forPage($currentPage, $perPage);
        $lastPage = ceil($total / $perPage);

        return view('last-deliveries', [
            'lastDeliveries' => $lastDeliveries,
            'currentPage' => $currentPage,
            'lastPage' => $lastPage,
            'total' => $total,
        ]);
    }
}
