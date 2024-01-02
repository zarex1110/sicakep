<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Source;
use App\Models\Card;
use Illuminate\Http\Request;

class DashboardIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.incomes.index', [
            'incomes' => Income::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.incomes.create', [
            'sources' => Source::all(),
            'cards' => Card::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'card_id' => 'required',
            'amount' => 'required|numeric',
            'source' => 'required',
            'date' => 'required|date'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Income::create($validatedData);

        return redirect('/dashboard/incomes')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        return view('dashboard.incomes.show', [
            'incomes' => $income
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        return view('dashboard.incomes.edit', [
            'incomes' => $income,
            'cards' => Card::all(),
            'sources' => Source::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'card' => 'required|numeric',
            'amount' => 'required|numeric',
            'source' => 'required',
            'date' => 'nullable'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Income::where('id', $income->id)->update($validatedData);

        return redirect('/dashboard/incomes')->with('success','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        Income::destroy($income->id);

        return redirect('/dashboard/incomes')->with('success','Data telah dihapus!');
    }
}
