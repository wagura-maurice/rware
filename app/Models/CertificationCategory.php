<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CertificationCategory extends Model
{
    use HasFactory;

    const ACTIVE   = 'active';
    const INACTIVE = 'inactive';

    protected $fillable = [
        'certification_type_id',
        'name',
        'price',
        'period',
        'description',
        '_status'
    ];

    public static $createRules = [
        'certification_type_id' => 'required|integer',
        'name' => 'required|string',
        'price' => 'required|string',
        'period' => 'required|string',
        'description' => 'nullable|string'
    ];

    public static $updateRules = [
        'certification_type_id' => 'nullable|integer',
        'name' => 'nullable|string',
        'price' => 'nullable|string',
        'period' => 'nullable|string',
        'description' => 'nullable|string'
    ];

    public function type()
    {
        return $this->belongsTo(CertificationType::class, 'certification_type_id')->withDefault();
    }
}
