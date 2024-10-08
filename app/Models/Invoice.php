<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'invoce_no',
        'total',
        'state',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
