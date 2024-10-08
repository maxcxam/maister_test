<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Invoice extends Model
{
    protected $fillable = [
        'invoice_no',
        'total',
        'state',
        'user_id',
    ];

    public static function generateNo()
    {
        $invoceNo = Str::random(6);
        if(Invoice::where('invoice_no', $invoceNo)->exists()) {
            return self::generateNo();
        }
        return $invoceNo;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
