<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sof extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'company_id',
        'price',
        'description',
        'status',
        'comment',
    ];

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 0:
                $status = '<span class="badge badge-secondary">Inprogress</span>';
                break;
            case 1:
                $status = '<span class="badge badge-warning">Pending</span>';
                break;
            case 2:
                $status = '<span class="badge badge-success">Approved</span>';
                break;
            case 3:
                $status = '<span class="badge badge-danger">Rejected</span>';
                break;
        }

        return $status;
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
