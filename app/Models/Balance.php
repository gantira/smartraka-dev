<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Balance extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_id',
        'description',
        'qty',
        'debit',
        'credit',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class)->withTrashed();
    }

    public function scopeMyCompany()
    {
        return $this->whereHas('document', function ($q) {
            return $q->myCompany();
        });
    }

    public function scopeVerified($q)
    {
        return $q->whereHas('document', function ($q) {
            return $q->whereStatus(1);
        });
    }
}
