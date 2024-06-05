<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
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
}
