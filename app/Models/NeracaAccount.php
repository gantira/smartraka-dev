<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NeracaAccount extends Model
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
                $status = 'Aktiva';
                break;
            case 1:
                $status = 'Pasiva';
                break;
        }

        return $status;
    }
}
