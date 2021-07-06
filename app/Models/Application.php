<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    const PROCESSING = 'processing';
    const APPROVED   = 'approved';
    const REJECTED   = 'rejected';

    protected $fillable = [
        'uniqueID',
        'user_id',
        'business_id',
        'category_id',
        'total_amount',
        'paid_amount',
        'expiration_date',
        'description',
        '_status'
    ];

    public static $paymentRules = [
        'short_code'       => 'required|string',
        'account_number'   => 'required|string',
        'amount'           => 'required|string',
        'transaction_code' => 'required|string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    public function business()
    {
        return $this->belongsTo(Business::class)->withDefault();
    }

    public function category()
    {
        return $this->belongsTo(CertificationCategory::class)->withDefault();
    }
}
