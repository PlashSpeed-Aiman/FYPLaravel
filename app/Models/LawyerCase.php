<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LawyerCase extends Model
{
    use HasFactory;

    protected $table = 'lawyer_case';
    protected $fillable = ['lawyer_id', 'case_id'];

    public function lawyer()
    {
        return $this->belongsTo(Lawyer::class);
    }

    public function cases()
    {
        return $this->belongsTo(Cases::class);
    }

}
