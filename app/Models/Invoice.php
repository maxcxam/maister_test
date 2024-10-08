<?php

namespace App\Models;

use App\Enums\Status;
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

    protected $casts = [
        'state' => Status::class,
    ];

    public static function generateNo()
    {
        $invoiceNo = Str::random(6);
        if(Invoice::where('invoice_no', $invoiceNo)->exists()) {
            return self::generateNo();
        }
        return $invoiceNo;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
