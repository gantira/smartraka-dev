<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Signature extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sebagai',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
