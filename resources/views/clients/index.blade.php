<x-app-layout>
    <h1>Clients List</h1>
    <a href="{{ route('clients.create') }}" class="btn btn-primary">Add New Client</a>
    <table class="table mt-4">
        <thead>
        <tr>
            <th>Avatar</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($clients as $client)
            <tr>
                <td><img src="{{ $client->avatar && file_exists(storage_path('app/public/' . $client->avatar)) ? asset('storage/' . $client->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" width="100" height="100"></td>                
                <td>{{ $client->first_name }}</td>
                <td>{{ $client->last_name }}</td>
                <td>{{ $client->email }}</td>
                <td>
                    <a href="{{ route('clients.show', $client) }}" class="btn btn-info">View</a>
                    <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('clients.destroy', $client) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $clients->links() }}
</x-app-layout>
