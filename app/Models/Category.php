<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'account_id',
        'name',
        'description',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function getAccountStatusLabelAttribute()
    {
        return $this->account->status_label;
    }

    public function scopeIn($query)
    {
        return $query->whereHas('account', function ($query) {
            return $query->where('status', 0);
        });
    }

    public function scopeOut($query)
    {
        return $query->whereHas('account', function ($query) {
            return $query->where('status', 1);
        });
    }

    public function scopeMyCompany()
    {
        return $this->whereCompanyId(auth()->user()->company->id);
    }

    public function getAccountStatusBadgeLabelAttribute()
    {
        switch ($this->account->status) {
            case 0:
                $status = "<span class='badge badge-pill badge-success'>{$this->account->status_label}</span>";
                break;
            case 1:
                $status = "<span class='badge badge-pill badge-warning'>{$this->account->status_label}</span>";
                break;
            case 2:
                $status = "<span class='badge badge-pill badge-default'>{$this->account->status_label}</span>";
                break;
        }

        return $status;
    }
}
