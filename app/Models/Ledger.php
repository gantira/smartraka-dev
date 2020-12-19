<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ledger extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_id',
        'company_id',
        'account_id',
        'parent_id',
        'description',
        'debit',
        'credit',
    ];

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function scopeVerified($q)
    {
        return $q->whereHas('document', function ($q) {
            return $q->whereStatus(1);
        });
    }

    public function parent_account()
    {
        return $this->belongsTo(Account::class, 'parent_id');
    }

    public function getAccountLabelAttribute()
    {
        return "{$this->account->name}";
    }

    public function scopeMyCompany()
    {
        return $this->whereCompanyId(auth()->user()->company->id);
    }
}
