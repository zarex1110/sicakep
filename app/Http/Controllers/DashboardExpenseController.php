<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Type;
use App\Models\Expense;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.expenses.index', [
            'expenses' => Expense::where('user_id',auth()->user()->id)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.expenses.create', [
            'types' => Type::all(),
            'payments' => Payment::all(),
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
            'type_id' => 'required',
            // 'subtype_id' => 'required',
            'amount' => 'required|numeric',
            'payment_id' => 'required',
            'card_id' => 'required',
            'invoice' => 'required',
            'date' => 'required|date',
            'image' => 'image|file|max:5120'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('expense-images');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['subtype_id'] = '1';

        Expense::create($validatedData);

        return redirect('/dashboard/expenses')->with('success','Data baru telah ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('dashboard.expenses.show', [
            'expenses' => $expense
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('dashboard.expenses.edit', [
            'expenses' => $expense,
            'types' => Type::all(),
            'payments' => Payment::all(),
            'cards' => Card::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'type_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'payment_id' => 'required',
            'card_id' => 'required',
            'invoice' => 'required',
            'date' => 'nullable',
            'image' => 'image|file|max:5120'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        if($request->file('image')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('expense-images');
        }

        Expense::where('id', $expense->id)->update($validatedData);

        return redirect('/dashboard/expenses')->with('success','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        if($expense->image) {
            Storage::delete($expense->image);
        }

        Expense::destroy($expense->id);

        return redirect('/dashboard/expenses')->with('success','Data telah dihapus!');
    }
}
