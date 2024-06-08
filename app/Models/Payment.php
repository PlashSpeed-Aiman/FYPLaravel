<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'amount', 'payment_date', 'payment_method'
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function invoicePayments()
    {
        return $this->hasMany(InvoicePayment::class);
    }
}
