<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.expenses.index', [
            'transactions' => Transaction::where('user_id',auth()->user()->id)
            ->paginate(10)->withQueryString()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.expenses.create', [
            'types' => Type::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'type_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'payment' => 'required',
            'used' => 'required',
            'invoice' => 'required',
            'date' => 'nullable',
            'image' => 'image|file|max:5120'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('expense-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Transaction::create($validatedData);

        return redirect('/dashboard/expenses')->with('success','Data baru telah ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $expense)
    {
        return view('dashboard.expenses.show', [
            'expenses' => $expense
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $expense)
    {
        return view('dashboard.expenses.edit', [
            'transaction' => $expense,
            'types' => Type::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $expense)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'type_id' => 'required|numeric',
            'amount' => 'required|numeric',
            'payment' => 'required',
            'used' => 'required',
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

        Transaction::where('id', $expense->id)->update($validatedData);

        return redirect('/dashboard/expenses')->with('success','Data telah diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $expense)
    {
        if($expense->image) {
            Storage::delete($expense->image);
        }

        Transaction::destroy($expense->id);

        return redirect('/dashboard/expenses')->with('success','Data telah dihapus!');
    }
}
