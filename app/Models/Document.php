<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'sof',
        'description',
        'status',
        'image',
        'transaction_date',
    ];

    public function getInvoiceAttribute()
    {
        switch (strlen($this->id)) {
            case 1:
                $no = '0000';
                break;
            case 2:
                $no = '000';
                break;
            case 3:
                $no = '00';
                break;
            case 4:
                $no = '0';
                break;
            default:
                $no = '';
                break;
        }
        return "{$no}{$this->id}";
    }

    public function getPreviewImageAttribute()
    {
        return asset('storage/images/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withTrashed();
    }

    public function documentDetail()
    {
        return $this->hasMany(DocumentDetail::class);
    }

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 0:
                $status = '<span class="badge badge-secondary">Inprogress</span>';
                break;
            case 1:
                $status = '<span class="badge badge-success">Approved</span>';
                break;
            case 2:
                $status = '<span class="badge badge-danger">Rejected</span>';
                break;
            case 3:
                $status = '<span class="badge badge-warning">Pending</span>';
                break;
        }

        return $status;
    }

    public function scopeIn($query)
    {
        return $query->whereHas('category.account', function ($query) {
            return $query->where('status', 0);
        });
    }

    public function scopeOut($query)
    {
        return $query->whereHas('category.account', function ($query) {
            return $query->where('status', 1);
        });
    }

    public function getTotalAttribute()
    {
        return $this->documentDetail->sum(function ($value) {
            return $value['qty'] * $value['price'];
        });
    }

    public function getTotalQtyAttribute()
    {
        return $this->documentDetail->sum('qty');
    }

    public function updateStatus($id)
    {
        return $this->update([
            'status' => $id
        ]);
    }

    public function scopeStatusCount($query, $status = 0)
    {
        return $query->whereStatus($status)->count();
    }

    public function scopeMyCompany($query)
    {
        return $query->whereHas('category', function ($query) {
            return $query->whereCompanyId(7);
        });
    }
}
