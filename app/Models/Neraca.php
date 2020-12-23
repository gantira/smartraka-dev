<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Neraca extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'neraca_account_id',
        'company_id',
        'name',
        'price',
        'month',
        'year',
    ];

    public function scopeMyCompany()
    {
        return $this->whereCompanyId(auth()->user()->company->id);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getCompanyLabelAttribute()
    {
        return $this->company->name;
    }

    public function neraca_account()
    {
        return $this->belongsTo(NeracaAccount::class);
    }
}
