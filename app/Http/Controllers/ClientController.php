<?php

namespace App\Http\Controllers;
use App\Models\Client;
use App\Models\Sales;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ClientController extends Controller
{
    public function index() {
        $clients = Client::paginate(6);
        return Inertia::render('Clients/index', [
            'clients' => $clients
        ]);
    }

    public function show(Client $client)
    {
        $transactions = $client->sales()
            ->with(['soldItems' => function ($query) {
                $query->select('sale_id', 'amount', 'qty');
            }])
            ->get()
            ->map(function ($sale) {
                $totalAmount = $sale->soldItems->sum(function ($item) {
                    return $item->amount * $item->qty;
                });

                unset($sale->soldItems);

                $sale->total_amount = $totalAmount;
                return $sale;
            });

        return Inertia::render('Clients/ShowClient', [
            'client' => $client,
            'transactions' => $transactions,
        ]);
    }
}
