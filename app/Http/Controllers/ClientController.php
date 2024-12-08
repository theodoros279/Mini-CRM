<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::paginate(10); // Fetch clients with pagination
        return view('clients.index', compact('clients')); // Pass to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.create'); // Display the form for creating a client
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
            'avatar' => 'required|image|dimensions:min_width=100,min_height=100|max:2048',
        ]);

        // Handle avatar upload
        $avatarPath = $request->file('avatar')->store('avatars', 'public');

        // Create the client
        Client::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'avatar' => $avatarPath,
        ]);

        return redirect()->route('clients.index')->with('success', 'Client created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client')); // Show client details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client')); // Display the edit form
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
            'avatar' => 'nullable|image|dimensions:min_width=100,min_height=100|max:2048',
        ]);

        // Handle avatar update if a new one is uploaded
        if ($request->hasFile('avatar')) {
            // Delete old avatar if it exists
            if ($client->avatar) {
                Storage::delete('public/' . $client->avatar);
            }
            //Store new avatar
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
            $client->avatar = $avatarPath;
        }

        // Update other fields
        $client->update($request->only('first_name', 'last_name', 'email'));

        return redirect()->route('clients.index')->with('success', 'Client updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        // Delete the avatar file if it exists
        if ($client->avatar) {
            Storage::disk('public')->delete($client->avatar);
        }

        // Delete the client
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully!');
    }

}
