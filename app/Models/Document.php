<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $fillable = ['cases_id', 'document_path', 'document_name'];

    public function case()
    {
        return $this->belongsTo(Cases::class);
    }
}
