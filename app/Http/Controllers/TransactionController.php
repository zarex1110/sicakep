<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('finnanceapp', [
            "title" => "Finance App",
            "transactions" => Transaction::with(['user','type'])->latest()->filter(request(['search']))
            ->paginate(10)->withQueryString()
        ]);
    }

    public function show(Transaction $transaction)
    {
        return view('detail', [
            "title" => "Detail",
            "transaction" => $transaction
        ]);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
