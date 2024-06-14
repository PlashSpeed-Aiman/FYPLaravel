<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;


    protected $fillable = [
        'case_number',
        'date',
        'client_id',
        'case_status',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function lawyerCase()
    {
        return $this->hasMany(LawyerCase::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
