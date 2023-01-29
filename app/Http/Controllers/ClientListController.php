<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;


class ClientListController extends Controller
{
    public function index(): View
    {
       // $clients = DB::table('clients')->simplePaginate(10);
        //sort by name
        $clients = Client::orderBy('name')->Paginate(10)->onEachSide(1);
//avoid displaying any text in the pagination links
        $clients->withPath('');


        //get 2 on each side of current page


        //$clients = Client::orderBy('name')->simplePaginate(10);
        return view('clients', [
            'clients' => $clients,
        ]);
    }

    public function show($id): Collection
    {
        return Client::find($id)->addresses;
    }
}
