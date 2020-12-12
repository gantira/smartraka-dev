<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function getStatusLabelAttribute()
    {
        switch ($this->status) {
            case 0:
                $status = 'Pemasukan';
                break;
            case 1:
                $status = 'Pengeluaran';
                break;
            case 2:
                $status = 'Cash Bank';
                break;
        }

        return $status;
    }

    public function getStatusBadgeLabelAttribute()
    {
        switch ($this->status) {
            case 0:
                $status = '<span class="badge badge-pill badge-info">Pemasukan</span>';
                break;
            case 1:
                $status = '<span class="badge badge-pill badge-warning">Pengeluaran</span>';
                break;
            case 2:
                $status = '<span class="badge badge-pill badge-secondary">Cash Bank</span>';
                break;
        }

        return $status;
    }
}
