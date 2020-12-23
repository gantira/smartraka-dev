<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocumentDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'document_id',
        'product_id',
        'qty',
        'price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class)->withTrashed();
    }

    public function getAccountLabelAttribute()
    {
        return $this->document->category->account->name;
    }

    public function getAccountStatusLabelAttribute()
    {
        return $this->document->category->account->account_label;
    }

    public function getProductLabelAttribute()
    {
        return $this->product->name;
    }

    public function document()
    {
        return $this->belongsTo(Document::class)->withTrashed();
    }

    public function scopeVerified($q)
    {
        return $q->whereHas('document', function ($q) {
            return $q->whereStatus(1);
        });
    }

    public function scopeMyCompany($q)
    {
        return $q->whereHas('document', function ($q) {
            return $q->whereHas('category', function ($q) {
                return $q->whereCompanyId(auth()->user()->company->id);
            });
        });
    }

    public function getCompanyLabelAttribute()
    {
        return $this->document->category->company->name;
    }

    public function scopeTotal($query)
    {
        return $query->count();
    }
}
