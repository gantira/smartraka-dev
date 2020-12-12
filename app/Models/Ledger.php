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
}
