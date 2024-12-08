<x-app-layout>
    <h1>Client Details</h1>
    <div>
        <strong>First Name:</strong> {{ $client->first_name }}
    </div>
    <div>
        <strong>Last Name:</strong> {{ $client->last_name }}
    </div>
    <div>
        <strong>Email:</strong> {{ $client->email }}
    </div>
    <div>
        <strong>Avatar:</strong>
        <img src="{{ $client->avatar && file_exists(storage_path('app/public/' . $client->avatar)) ? asset('storage/' . $client->avatar) : asset('images/default-avatar.png') }}" alt="Avatar" width="100" height="100">
    </div>
    <a href="{{ route('clients.index') }}" class="btn btn-primary mt-3">Back to List</a>
</x-app-layout>
