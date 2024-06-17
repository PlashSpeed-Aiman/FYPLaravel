<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // Add this line
        'name',
        'address',
        'phone',
        'email',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
    public function invoices(): HasMany
    {
        return $this->hasMany(Invoice::class);
    }
    public function cases(): HasMany
    {
        return $this->hasMany(Cases::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
