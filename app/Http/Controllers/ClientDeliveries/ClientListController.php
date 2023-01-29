<?php

namespace App\Http\Controllers\ClientDeliveries;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Support\Collection;
use Illuminate\View\View;

class ClientListController extends Controller
{
    public function index(): View
    {
        $clients = Client::orderBy('name')->Paginate(10)->onEachSide(1);

        return view('deliveries.clients', [
            'clients' => $clients,
        ]);
    }

    public function show($id): Collection
    {
        return Client::find($id)->addresses;
    }
}
