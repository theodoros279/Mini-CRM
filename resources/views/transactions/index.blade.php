<x-app-layout>
    <h1>Transactions List</h1>
    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Add New Transaction</a>
    <table class="table mt-4">
        <thead>
        <tr>
            <th>Client</th>
            <th>Transaction Date</th>
            <th>Amount</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->client->first_name }} {{ $transaction->client->last_name }}</td>
                <td>{{ $transaction->transaction_date->format('Y-m-d') }}</td>
                <td>${{ number_format($transaction->amount, 2) }}</td>
                <td>
                    <a href="{{ route('transactions.show', $transaction) }}" class="btn btn-info">View</a>
                    <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $transactions->links() }}
</x-app-layout>
