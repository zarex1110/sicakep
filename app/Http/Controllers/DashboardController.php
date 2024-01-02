<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'expenses' => Expense::where('user_id',auth()->user()->id)->get(),
            'total' => Expense::where('user_id',auth()->user()->id)->sum('amount'),
            'totalday' => Expense::where('user_id',auth()->user()->id)->whereDate('date', now())->sum('amount'),
            'transaksi' => Expense::where('user_id',auth()->user()->id)->count('title'),
        ]);
    }

    public function show(Expense $expenses)
    {
        return view('dashboard.index', [
            "title" => "index",
            "expenses" => $expenses
        ]);
    }
}
