<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    // Fields that can be mass-assigned
    protected $fillable = ['first_name', 'last_name', 'email', 'avatar'];

    /**
     * Define the relationship to transactions.
     * A client can have many transactions.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
