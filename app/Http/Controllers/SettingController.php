<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
class SettingController extends Controller
{
    public function index()
    {
        return view('dashboard.setting.index', [
            'expenses' => Expense::where('user_id',auth()->user()->id)->get()
        ]);
    }

    public function show(Expense $expenses)
    {
        return view('dashboard.setting.index', [
            "title" => "index",
            "expenses" => $expenses
        ]);
    }
}
