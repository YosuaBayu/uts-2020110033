<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::all();
        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        return view('transactions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required',
            'notes' => 'nullable',
        ]);

        Transaction::create([
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction created successfully');
    }

    public function edit(Transaction $transaction)
    {
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'type' => 'required|in:income,expense',
            'category' => 'required',
            'notes' => 'nullable',
        ]);

        $transaction->update([
            'amount' => $request->amount,
            'type' => $request->type,
            'category' => $request->category,
            'notes' => $request->notes,
        ]);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction updated successfully');
    }

    public function destroy(Transaction $transaction)
    {
        $transaction->delete();

        return redirect()->route('transactions.index')
            ->with('success', 'Transaction deleted successfully');
    }
}
