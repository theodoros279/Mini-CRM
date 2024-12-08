<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('client')->paginate(10); // Get 10 transactions per page with associated client data
        return view('transactions.index', compact('transactions')); // Pass transactions to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clients = Client::all(); // Fetch all clients for the client dropdown
        return view('transactions.create', compact('clients')); // Pass clients to the view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        // Create a new transaction
        Transaction::create($request->only('client_id', 'transaction_date', 'amount'));

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        $transaction->load('client'); // Load the associated client data
        return view('transactions.show', compact('transaction')); // Pass the transaction to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        $clients = Client::all(); // Fetch all clients for the client dropdown
        return view('transactions.edit', compact('transaction', 'clients')); // Pass the transaction and clients to the view
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'transaction_date' => 'required|date',
            'amount' => 'required|numeric|min:0',
        ]);

        // Update the transaction with new data
        $transaction->update($request->only('client_id', 'transaction_date', 'amount'));

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete(); // Delete the transaction
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully!');
    }
}
