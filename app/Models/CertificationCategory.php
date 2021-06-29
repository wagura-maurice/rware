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
}
