<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_id',
        'company_id',
        'account_id',
        'description',
        'debit',
        'credit',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class)->withTrashed();
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeMyCompany()
    {
        return $this->whereCompanyId(auth()->user()->company->id);
    }

    public function scopeVerified($q)
    {
        return $q->whereHas('document', function ($q) {
            return $q->whereStatus(1);
        });
    }
}
