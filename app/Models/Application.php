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

    public static $createRules = [
        'uniqueID'        => 'required|string',
        'user_id'         => 'required|integer',
        'business_id'     => 'required|integer',
        'category_id'     => 'required|string',
        'total_amount'    => 'required|numeric',
        'paid_amount'     => 'nullable|string',
        'expiration_date' => 'required|date',
        'description'     => 'nullable|string'
    ];

    public static $updateRules = [
        'uniqueID'        => 'nullable|string',
        'user_id'         => 'nullable|integer',
        'business_id'     => 'nullable|integer',
        'category_id'     => 'nullable|string',
        'total_amount'    => 'nullable|string',
        'paid_amount'     => 'nullable|string',
        'expiration_date' => 'nullable|date',
        'description'     => 'nullable|string'
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
