<x-app-layout>
    <h1>Create Client</h1>
    <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="avatar">Avatar (100x100 minimum)</label>
            <input type="file" name="avatar" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success submit-btn">Create Client</button>
    </form>
</x-app-layout>
