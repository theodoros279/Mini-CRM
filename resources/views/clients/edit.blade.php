<x-app-layout>
    <h1>Edit Client</h1>
    <form action="{{ route('clients.update', $client) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" value="{{ $client->first_name }}" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" value="{{ $client->last_name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $client->email }}" required>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar (100x100 minimum)</label>
            <input type="file" name="avatar" class="form-control">
            <p>Current Avatar:</p>
            <img src="{{ asset('storage/' . $client->avatar) }}" alt="Avatar" width="100" height="100">
        </div>
        <button type="submit" class="btn btn-warning submit-btn">Update Client</button>
    </form>
</x-app-layout>
