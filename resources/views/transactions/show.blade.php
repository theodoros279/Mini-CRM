<x-app-layout>
    <h1>Transaction Details</h1>
    <div>
        <strong>Client:</strong> {{ $transaction->client->first_name }} {{ $transaction->client->last_name }}
    </div>
    <div>
        <strong>Transaction Date:</strong> {{ $transaction->transaction_date->format('Y-m-d') }}
    </div>
    <div>
        <strong>Amount:</strong> ${{ number_format($transaction->amount, 2) }}
    </div>
    <a href="{{ route('transactions.index') }}" class="btn btn-primary mt-3">Back to List</a>
</x-app-layout>
