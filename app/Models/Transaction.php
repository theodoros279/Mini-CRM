<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['client_id', 'transaction_date', 'amount'];

    protected $casts = [
        'transaction_date' => 'date',
    ];

    /**
     * Define the relationship to the client.
     * A transaction belongs to a single client.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
